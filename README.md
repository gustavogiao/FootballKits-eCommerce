# ⚽️ FootballKits eCommerce

Uma aplicação de eCommerce em **PHP nativo** focada na venda de equipamentos de futebol. O projeto foi concebido para servir como estudo prático de PHP e MySQL, mas mantém uma estrutura sólida e extensível para evoluir para uma loja completa.

## ✨ Principais destaques
- Catálogo dinâmico com filtros por **clubes/marcas** e **categorias**.
- Páginas de detalhes dos produtos com galeria de imagens.
- Carrinho de compras com cálculo automático de totais.
- Sistema de **autenticação de utilizadores** (registo, login, atualização de perfil e histórico de encomendas).
- Área administrativa completa para gestão de produtos, categorias, marcas, encomendas, pagamentos e utilizadores.
- Interface responsiva construída com **Bootstrap 5** e **Font Awesome**.

## 🧱 Stack técnica
- PHP 8+ (procedural)
- MySQL/MariaDB (extensão `mysqli`)
- HTML5, CSS3 e Bootstrap 5
- JavaScript básico para interações na interface

## 📁 Estrutura do projeto
```
FootballKits-eCommerce/
├── index.php               # Página inicial e vitrine principal
├── displayAll.php          # Catálogo completo de produtos
├── productDetails.php      # Detalhe individual de produtos
├── cart.php                # Gestão do carrinho
├── admin_area/             # Backoffice administrativo
│   ├── insertProduct.php   # CRUD de produtos (imagens em admin_area/product_images)
│   └── ...                 # Gestão de marcas, categorias, encomendas, pagamentos e utilizadores
├── users_area/             # Fluxos autenticados (perfil, encomendas, pagamentos)
├── functions/common_function.php # Funções utilitárias (produtos, carrinho, pesquisa, etc.)
├── includes/connect.php    # Ligação à base de dados
└── style.css               # Estilos customizados
```

## 🚀 Como executar localmente
1. **Pré-requisitos**
   - PHP 8 ou superior.
   - Servidor Apache/Nginx ou o servidor embutido do PHP.
   - MySQL/MariaDB.
   - Extensão `mysqli` ativa.

2. **Clonar o repositório**
   ```bash
   git clone https://github.com/<seu-usuario>/FootballKits-eCommerce.git
   cd FootballKits-eCommerce
   ```

3. **Configurar a base de dados**
   - Crie uma base de dados chamada `footballstore` (ou altere o nome em `includes/connect.php`).
   - Crie as seguintes tabelas de acordo com as necessidades do projeto:
     - `productss` (produtos: título, descrição, preço, imagens, categoria, marca, palavras-chave, estado).
     - `brandss` (marcas/clubes).
     - `categoriess` (categorias de produto).
     - `user_table` (utilizadores e credenciais).
     - `cart_details`, `user_orders`, `user_payments`, entre outras tabelas auxiliares usadas na área administrativa.
   - Importe/insira dados de exemplo nas tabelas (as imagens dos produtos devem ficar em `admin_area/product_images/`).

4. **Configurar credenciais**
   - Atualize `includes/connect.php` com os dados de acesso ao MySQL caso não esteja a usar o padrão `root` sem senha.

5. **Iniciar o servidor**
   - Com Apache (XAMPP/WAMP/Laragon): mova o projeto para a pasta `htdocs` e aceda a `http://localhost/FootballKits-eCommerce`.
   - Com o servidor embutido do PHP:
     ```bash
     php -S localhost:8000
     ```
     Em seguida, abra `http://localhost:8000/index.php` no navegador.

6. **Aceder à área administrativa**
   - `http://localhost:8000/admin_area/index.php`
   - Crie um registo administrativo via `admin_area/adminRegistration.php` e utilize `admin_area/adminLogin.php` para entrar.

## 🔐 Segurança e boas práticas
- Substitua as credenciais padrão do MySQL por utilizadores com permissões mínimas.
- Configure HTTPS e mecanismos de hashing para palavras-passe em ambientes de produção.
- Valide e sanitize entradas provenientes de formulários para prevenir SQL Injection e XSS.

## 🛠️ Próximos passos sugeridos
- Implementar integração com gateways de pagamento reais.
- Adicionar testes automatizados e camadas de serviço/DAO para melhorar a manutenção.
- Introduzir um sistema de gestão de stock e relatórios analíticos.
- Migrar para uma arquitetura MVC ou para frameworks como Laravel quando estiver confortável com PHP nativo.

## 🤝 Contribuições
Sinta-se à vontade para abrir *issues* e *pull requests* com melhorias, correções ou novas funcionalidades. Toda a ajuda é bem-vinda! 

## 📄 Licença
Este projeto é distribuído apenas para fins educativos. Adapte a licença conforme necessário antes de o utilizar em produção.
