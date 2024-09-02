# Teste prático - Federal Soluções Técnicas

## Instalação 
* Execute composer install
* Renomeie o arquivo .env.example para .env
* Configure o acesso ao servidor SMTP no arquivo .env
* Configure o acesso do seu banco de dados postgree no arquivo .env
* Execute php artisan key:generate
* Execute php artisan migrate
* Execute php artisan db:seed


## Resumo

Este projeto foi desenvolvido usando Laravel e postgres.
O usuário administrador possui um painel administrativo onde ele pode estar fazendo o CRUD de veículos e deletando usuários, tendo a opção de deletar somente o usuário ou deletar seus veículos junto da operação.
Ao se cadastrar ou tentar redefinir a senha, você receberá um e-mail de confirmação e o usuário administrador não tem que confirmar seu e-mail por padrão.

Sempre que ocorrer uma alteração em algum veículo, caso exista algum usuário associado a esse veículo, ele será notificado por e-mail e caso ocorra uma alteração do usuário (dono) associado ao veículos, ambos os usuários (antigo e novo) serão notificados.

No painel de usuários, a única tela disponível é a lista de carros pertencentes ao usuário.

O sistema implementa verificações para ignorar registros deletados (softdelete) e assim não gerar erros ao tentar cadastrar veículos com a mesma placa de veículos já deletados, porém, não é possível cadastrar veículos com a mesma placa de veículos ativos (não deletados).

Existem também verificações para o CPF na hora do cadastro de usuários e verificações relacionadas ao RENAVAM dos veículos cadastrados.

Durante o desenvolvimento, eu utilizei o serviço MailTrap para envio dos e-mails.
Recomendo o uso dele para teste pois ele atua no envio e recebimento das mensagens para uma caixa de correio "fictícia", onde você pode visualizá-las em um cliente de e-mail verdadeiro. Essa abordagem tem a vantagem de permitir que você inspecione os e-mails finais no visualizador de mensagens do Mailtrap.
