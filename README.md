# Elaboração de aplicação web integrada a um banco de dados

&emsp; Este trabalho tem como objetivo demonstrar o desenvolvimento e a implementação de uma aplicação web integrada a um banco de dados Amazon RDS. A aplicação permite a gestão de informações de departamentos dentro de uma organização. 

&emsp;Ao acessar a página "Departments", os usuários podem adicionar informações relevantes, como o nome do departamento, o gestor responsável, a data de criação e a quantidade de funcionários. Bem como, visualizar uma lista completa de todos os departamentos já registrados.

&emsp; O desenvolvimento deste projeto foi baseado no tutorial oficial da AWS, disponível em: https://docs.aws.amazon.com/pt_br/AmazonRDS/latest/UserGuide/TUT_WebAppWithRDS.html. 

&emsp;Para a implementação, foram utilizados os seguintes recursos e tecnologias:

- **Amazon EC2:** Instância para hospedar o servidor Apache e a aplicação web.

- **Amazon RDS:** Banco de dados gerenciado, utilizado para armazenar as informações dos departamentos.

- **PHP e MySQL:** Linguagem de programação e banco de dados escolhidos para o desenvolvimento da aplicação web.

- **GitHub:** Controle de versão e repositório para o código-fonte do projeto.

&emsp; Ademais, o seguinte repositório possui os seguintes arquivos:

- **Departments.php:** Este arquivo PHP implementa uma aplicação web para a gestão de departamentos. Ele se conecta a um banco de dados MySQL, permite a inserção de novos registros, como o nome do setor, gestor responsável, data de início e quantidade de funcionários, e exibe uma lista de todos os departamentos registrados.

- **SamplePage.php:** Arquivo desenvolvido durante o tutorial da AWS, que implementa uma aplicação web para a gestão de pessoas. Ele se conecta a um banco de dados MySQL, permite a inserção de novos registros, como nome e endereço, e exibe uma lista de todas as pessoas registradas. 

- **dbinfo.inc:** Contém informações importantes da AWS necessárias para estabelecer a conexão com o banco de dados.

&emsp; Portanto, a seguir será apresentado um vídeo demonstrando as máquinas/serviços em execução no console da AWS e o projeto em funcionamento: https://drive.google.com/file/d/1OduZKctFUgyQvNK3O0Ez6T42KkCWg5uU/view?usp=drive_link.