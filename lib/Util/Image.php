<?php

//classe para inserção e exclusão de imagens na pasta 'img/prods'
abstract class Image
{
    //salvando a imagem na pasta
    public static function save($file)
    {
        //caminho para salvar a imagem
        $target = "img/prods/" . $file['name'];

        //tipos de arquivos permitidos
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        //pegando a extensão da imagem passada
        $fileExtension = explode('.', $file['name']);
        $fileExtension = strtolower(end($fileExtension));

        //verficação para testar a integridade do arquivo passado
        if ($file['error'] == 0) {
            if ($file['size'] < 7000000) {
                if (in_array($fileExtension, $allowed)) {

                    //se tudo estiver ok, adicione ele na pasta
                    move_uploaded_file($file['tmp_name'], $target);
                }
            }
        }
    }

    //deletando a imagem da pasta
    public static function delete($id)
    {
        //pegando nome da imagem a ser deletada do db
        $prod = Product::selectWhere($id);
        $prodImageName = $prod['prod_image'];

        //pegando caminho (path) para a imagem
        $filePath = 'img/prods/' . $prodImageName;

        //se o arquivo existir, deletar o mesmo
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    //fazendo update, ou seja, removendo a antiga e adicionando a nova imagem
    public static function update($id, $file)
    {
        Image::delete($id);

        Image::save($file);
    }
}
