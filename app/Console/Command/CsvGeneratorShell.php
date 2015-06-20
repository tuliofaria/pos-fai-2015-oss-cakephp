<?php
    // para rodar
    // o php.exe deve estar no path e em seguida
    // entrar no cmd e ir para o diretorio app/Console da sua aplicação
    // executar:
    // cake -app c:\diretorioAtéApp\ csv_generator

    // crontab -e -u nomeUsuarioFTP
    // rodar a cada 5min 0,5,10,15,20,25,30,35,40,45,50,55 * * * * /var/www/.../Console/cake -app /var/www/../app/ converter
    // rodar as 4 da manha 0 4 * * *
    class CsvGeneratorShell extends AppShell {
        public $uses = array('Ordem');

        public function main() {
            $this->out("Gerando um CSV pesado...");
        }
    }