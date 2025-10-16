# 📂 Estrutura Base para Projetos em PHP Puro

Este repositório serve como **modelo inicial** para projetos em **PHP puro**, sem uso de frameworks.  
Ele organiza as pastas de forma simples e clara, ajudando a manter o código limpo, separado e pronto para evoluir.

---

## 🚀 Estrutura de Pastas

```bash
SITE-DINAMICO/
│
├── app/                 # Código-fonte da aplicação
│   ├── data/            # Dados simulados (arrays, configs, JSON ou simulação de banco)
│   └── components/      # Componentes reutilizáveis (estáticos ou dinâmicos)
│       ├── header.php   # Exemplo de componente estático
│       ├── footer.php   # Exemplo de componente estático
│       └── cardProduto.php # Exemplo de componente dinâmico (recebe props/variáveis)
│
├── public/              # Arquivos acessíveis pelo navegador
│   ├── assets/          # Arquivos estáticos (front-end)
│   │   ├── css/         # Estilos CSS
│   │   ├── imgs/        # Imagens
│   │   └── js/          # Scripts JavaScript
│   └── index.php        # Entrada principal do site
│
└── README.md            # Documentação do projeto
```

---

## ▶️ Como inicializar o projeto

1. **Instale o PHP** no seu computador (se ainda não tiver).  

2. Abra o terminal dentro da **pasta raiz** do projeto.

3. Rode o servidor embutido do PHP apontando para a pasta `public`:

```bash
php -S localhost:3000 -t public
```

4. Abra no navegador:  
   http://localhost:3000

> ⚠️ Importante: sempre rode o servidor na **pasta raiz** do projeto, senão os includes podem não funcionar corretamente.

---

## 📌 Conceitos importantes

- **PHP puro** → todos os includes são feitos manualmente, sem frameworks.  
- **`components/`** → pedaços de código reutilizáveis (ex: `header.php`, `footer.php`, `cardProduto.php`).  
- **`data/`** → dados centralizados (arrays, configs, JSON, etc.).  
- **`public/`** → tudo que o navegador acessa diretamente (CSS, JS, imagens, index).

---

## 📝 Boas práticas

- Crie **componentes pequenos** e reutilizáveis.  
- Use nomes descritivos (`cardProduto.php`, `listaUsuarios.php`).  
- Centralize dados em `app/data/`.  
- Mantenha arquivos de estilo e scripts dentro de `public/assets/`.  
- Use `include` ou `require` para chamar componentes dentro do `index.php`.

