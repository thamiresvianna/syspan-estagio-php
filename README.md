# **Trilha de Exercícios (Estágio) – PHP + MySQL**

Projeto desenvolvido para prática de estudos em PHP, contendo exercícios básicos e um CRUD completo de clientes utilizando MySQL.

## **Tecnologias utilizadas**
- PHP (PDO)
- MySQL
- HTML + CSS
- XAMPP (ou similar)

## **Estrutura**
- `aula01/`: fundamentos de PHP (variáveis, condições, laços e funções).
- `aula02/`: formulários e validação de dados.
- `aula03/`: script SQL (criação e consultas).
- `prints/`: imagens de resultados da aula 01.
- `projeto-crud/`: versão inicial do CRUD.
- `projeto-final/`: CRUD completo com validações, paginação e logs.

## **Como executar o projeto**

### **1. Clone o repositório**
```bash
git clone https://github.com/thamiresvianna/syspan-estagio-php.git
```

### **2. Configure o ambiente**
- Instale o XAMPP (ou outro servidor com PHP + MySQL).
- Coloque o projeto na pasta `htdocs`.

### **3. Crie o banco de dados**
Execute o script:
```bash
aula03/sql.sql
```

### **4. Configure a conexão**
Edite os arquivos:
```bash
projeto-crud/conexao.php
projeto-final/conexao.php
```

Ajuste se necessário:
```php
$host = '127.0.0.1'; 
$banco = 'syspan_estagio'; 
$usuario = 'root'; 
$senha = '';
```

### **5. Execute no navegador**
Acesse:
```bash
http://localhost/syspan-estagio-php/
```

### **6. Visualizando exercícios**
- Acesse as pastas `aula01/` e `aula02/` para executar os exercícios. 
- Visualize as imagens em `prints/aula01/`.

### **7. Projeto CRUD Inicial**
- Acesse `projeto-crud/`.
- Teste a listagem e o cadastro de clientes.

### **8. Projeto Final (CRUD completo)**
- Acesse `projeto-final/`.
- Teste todas as funcionalidades: listar, cadastrar, editar e excluir clientes.

## Autora

**Thamires Vianna**

GitHub: https://github.com/thamiresvianna