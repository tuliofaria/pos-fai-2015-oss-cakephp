<?
class Equipamento extends AppModel{
   
   public $useTable = "equipamentos";

   public $displayField = "nome";
   public $order = "Equipamento.nome ASC";
}