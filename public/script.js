document.addEventListener('DOMContentLoaded', () => {
    // Menu Mobile
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');

    if(mobileBtn) {
        mobileBtn.addEventListener('click', () => {
            const expanded = mobileBtn.getAttribute('aria-expanded') === 'true';
            mobileBtn.setAttribute('aria-expanded', !expanded);
            // Simples toggle de display ou classe CSS
            navLinks.style.display = expanded ? 'none' : 'flex';
            navLinks.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '100%';
            navLinks.style.left = '0';
            navLinks.style.width = '100%';
            navLinks.style.background = '#fff';
            navLinks.style.padding = '20px';
            navLinks.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
        });
    }

    // Smooth Scroll para links âncora
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if(target) {
                target.scrollIntoView({ behavior: 'smooth' });
                // Fechar menu mobile se estiver aberto
                if(window.innerWidth <= 768) {
                    navLinks.style.display = 'none';
                    mobileBtn.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });

    // Animação de entrada simples (Fade In)
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in, .sister-card, .product-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
});

/* =========================================
   GALERIA: FILTROS E LIGHTBOX
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. LÓGICA DE FILTROS ---
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-card');

    if(filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove classe active de todos e adiciona no clicado
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.classList.remove('hide');
                        item.classList.add('show');
                    } else {
                        item.classList.remove('show');
                        item.classList.add('hide');
                    }
                });
            });
        });
    }

    // --- 2. LÓGICA DE NOVO MODAL (IMAGEM + TEXTO) ---
    const modal = document.getElementById('lightbox-modal');
    const modalImg = document.getElementById('modal-img');
    const modalDescContent = document.getElementById('modal-desc-content');
    const closeModalBtn = document.querySelector('.close-modal');

    // Função para abrir o modal
    const openModal = (imgSrc, imgAlt, descHTML) => {
        modalImg.src = imgSrc;
        modalImg.alt = imgAlt;
        
        // Se tiver descrição, usa ela. Se não, usa uma mensagem padrão ou fica vazio.
        if (descHTML && descHTML.trim() !== "") {
            modalDescContent.innerHTML = descHTML;
        } else {
            // Opcional: Se não tiver texto, pode colocar só o título da imagem (alt)
            modalDescContent.innerHTML = `<h3>${imgAlt}</h3>`;
        }

        modal.classList.add('show'); // Adiciona classe que faz o fade-in
        document.body.style.overflow = 'hidden'; // Impede rolagem da página de fundo
    };

    // Função para fechar o modal
    const closeModal = () => {
        modal.classList.remove('show');
        document.body.style.overflow = ''; // Libera a rolagem
        setTimeout(() => {
             modalImg.src = ""; // Limpa imagem após animação
        }, 300);
    };

    if(modal) {
        // Evento de clique nos itens da galeria
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                // 1. Pega a imagem
                const img = item.querySelector('img');
                const src = img.getAttribute('src');
                const alt = img.getAttribute('alt');

                // 2. Pega o conteúdo da descrição escondida
                const hiddenDesc = item.querySelector('.hidden-description');
                const descHTML = hiddenDesc ? hiddenDesc.innerHTML : ""; // Pega o HTML interno (h3 e p)

                // 3. Abre o modal com os dados
                openModal(src, alt, descHTML);
            });
        });

        // Fechar ao clicar no X
        closeModalBtn.addEventListener('click', closeModal);

        // Fechar ao clicar fora do cartão (no fundo escuro)
        modal.addEventListener('click', (e) => {
            if(e.target === modal) {
                closeModal();
            }
        });

        // Fechar com a tecla ESC (Acessibilidade)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                closeModal();
            }
        });
    }
});

/* =========================================
   LOJA: LÓGICA DE FILTROS (MACRO E COLEÇÕES)
   ========================================= */
document.addEventListener('DOMContentLoaded', () => {
    const macroBtns = document.querySelectorAll('.macro-btn');
    const collectionSelect = document.getElementById('collection-dropdown');
    const products = document.querySelectorAll('.product-card');
    const searchInput = document.getElementById('store-search');

    // Função central para filtrar os produtos
    const filterProducts = () => {
        if(!products.length) return;

        const activeMacroBtn = document.querySelector('.macro-btn.active');
        const selectedMacro = activeMacroBtn ? activeMacroBtn.getAttribute('data-macro') : 'todos';
        const selectedCollection = collectionSelect ? collectionSelect.value : 'todas';
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';

        products.forEach(product => {
            const productMacro = product.getAttribute('data-macro');
            const productCollection = product.getAttribute('data-collection');
            const productName = product.querySelector('h3').innerText.toLowerCase();
            const productTag = product.querySelector('.collection-tag').innerText.toLowerCase();

            // Lógica: Mostrar se bate com o Macro (ou se Macro for 'todos') 
            // E bate com a Coleção (ou se Coleção for 'todas')
            // E bate com a Busca
            let matchMacro = (selectedMacro === 'todos' || productMacro === selectedMacro);
            let matchCollection = (selectedCollection === 'todas' || productCollection === selectedCollection);
            let matchSearch = (productName.includes(searchTerm) || productTag.includes(searchTerm));

            if (matchMacro && matchCollection && matchSearch) {
                product.classList.remove('hidden-by-filter');
            } else {
                product.classList.add('hidden-by-filter');
            }
        });
    };

    // Evento: Clique nos botões de Macrotemas
    if (macroBtns.length > 0) {
        macroBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                macroBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                // UX: Resetar o dropdown de coleções ao trocar de Macrotema
                if(collectionSelect) collectionSelect.value = 'todas';
                
                filterProducts();
            });
        });
    }

    // Evento: Mudança no Select de Coleções
    if (collectionSelect) {
        collectionSelect.addEventListener('change', () => {
            // UX: Se escolher uma coleção específica, marcamos o Macro como 'todos' para não dar conflito confuso
            if (collectionSelect.value !== 'todas') {
                macroBtns.forEach(b => b.classList.remove('active'));
                document.querySelector('.macro-btn[data-macro="todos"]').classList.add('active');
            }
            filterProducts();
        });
    }

    // Evento: Digitação na barra de busca
    if (searchInput) {
        searchInput.addEventListener('input', filterProducts);
    }
});