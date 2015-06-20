<h1>Captcha</h1>
<? echo $this->Form->create("Captcha") ?>
Digite o que você está vendo (ou não) na imagem:
<img src="<? echo $this->Html->url("/imagens/captcha") ?>" />
<? echo $this->Form->input("captcha") ?>
<? echo $this->Form->end("Entrar") ?>