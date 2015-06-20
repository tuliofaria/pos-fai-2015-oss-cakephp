<?
    class ImagensController extends AppController{

        public $uses = array();

        public function gerarThumb(){
            // upload
            $imagem = WWW_ROOT.DS."files".DS."imagem.jpg";
            $imagemDst = WWW_ROOT.DS."files".DS."imagem_thumb.jpg";

            $size = getimagesize($imagem);

            $width = $size[0];
            $height = $size[1];

            // 1 - Carregar imagem
            $imgSrc = imagecreatefromjpeg($imagem);
            $imgDst = imagecreatetruecolor(500,500);

            imagecopyresized ($imgDst , $imgSrc, 0, 0, 0, 0, 500, 500 , $width , $height);

            //header("Content-type: image/jpeg");
            imagejpeg($imgDst, $imagemDst);
            //imagejpeg($imgDst);

            exit;
        }

        public function captcha(){
            $img = imagecreate(400, 200);
            $codigo = "";
            $size = 4;
            for($i=0; $i<$size; $i++){
                $rand = rand(ord('A'), ord('Z'));
                $codigo .= chr($rand);
            }

            $this->Session->write("captcha", $codigo);

            $bg = imagecolorallocate($img, 255, 255, 255);
            imagefill ($img , 0 , 0 , $bg );

            $black = imagecolorallocate($img, 0, 0, 0);
            imagestring($img, 5, 30, 30, $codigo, $black);

            header("Content-type: image/jpeg");
            imagejpeg($img);
            exit;
        }

        public function mostrarCaptcha(){
            if($this->request->is("POST")){
                if($this->request->data["Captcha"]["captcha"]==$this->Session->read("captcha")){
                    $this->Session->setFlash("Acertou captcha!");
                }else{
                    $this->Session->setFlash("Errou captcha!");
                }
            }
        }

    }