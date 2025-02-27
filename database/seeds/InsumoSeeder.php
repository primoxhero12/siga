<?php

use Illuminate\Database\Seeder;
use siga\Modelo\insumo\insumo_registros\Insumo;

class InsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insumos = [
            ['ins_codigo'=>'MAP-1','ins_enumeracion'=>1,'ins_id_tip_ins'=>3,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'LECHE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'MAP-2','ins_enumeracion'=>2,'ins_id_tip_ins'=>3,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'ALMENDRA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'MAP-3','ins_enumeracion'=>3,'ins_id_tip_ins'=>3,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'MIEL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'MAP-4','ins_enumeracion'=>4,'ins_id_tip_ins'=>3,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'JUGO VIRGEN','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'MAP-5','ins_enumeracion'=>5,'ins_id_tip_ins'=>3,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>4,'ins_peso_presen'=>null,'ins_desc'=>'PULPA','ins_usr_id'=>1,'ins_id_planta'=>1],

            ['ins_codigo'=>'INS-1','ins_enumeracion'=>1,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'20 K','ins_desc'=>'ALMENDRA BROKEN','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-2','ins_enumeracion'=>2,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'18K','ins_desc'=>'ALMENDRA HARINA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-3','ins_enumeracion'=>3,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'18K','ins_desc'=>'ALMENDRA MEDIUM','ins_usr_id'=>1,'ins_id_planta'=>1],

            ['ins_codigo'=>'INS-4','ins_enumeracion'=>4,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'25K','ins_desc'=>'ALMIDON DE MAIZ','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-5','ins_enumeracion'=>5,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'AVENA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-6','ins_enumeracion'=>6,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'AZUCAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-7','ins_enumeracion'=>7,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'AZUCAR BLANCA NACIONAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-8','ins_enumeracion'=>8,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'170 GR','ins_desc'=>'AZUCAR MOLIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-9','ins_enumeracion'=>9,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'350GR','ins_desc'=>'AZUCAR MOLIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-10','ins_enumeracion'=>10,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'CHIA NATURAL OZONIZADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-11','ins_enumeracion'=>11,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'100G','ins_desc'=>'CHOCLATE COBERTURA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-12','ins_enumeracion'=>12,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>14,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE SUNSET','ins_usr_id'=>1,'ins_id_planta'=>1],

            ['ins_codigo'=>'INS-13','ins_enumeracion'=>13,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE AMARILLO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-14','ins_enumeracion'=>14,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>6,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE ARTIFICIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-15','ins_enumeracion'=>15,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>4,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE ','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-16','ins_enumeracion'=>16,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE HUEVO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-17','ins_enumeracion'=>17,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'ST-13','ins_desc'=>'COLORANTE HUEVO CLARO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-18','ins_enumeracion'=>18,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'ST-14','ins_desc'=>'COLORANTE HUEVO OSCURO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-19','ins_enumeracion'=>19,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE MORA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-20','ins_enumeracion'=>20,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE PONCEAUR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-21','ins_enumeracion'=>21,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>5,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE ROJO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-22','ins_enumeracion'=>22,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE ROJO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-23','ins_enumeracion'=>23,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>22,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-24','ins_enumeracion'=>24,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>6,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE ROJO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-25','ins_enumeracion'=>25,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>10,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE VERDE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-26','ins_enumeracion'=>26,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'COLORANTE VERDE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-27','ins_enumeracion'=>27,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'DURAZNOS EN ALMIBAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-28','ins_enumeracion'=>28,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>3,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-29','ins_enumeracion'=>29,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>2,'ins_peso_presen'=>'HP-514','ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-30','ins_enumeracion'=>30,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>13,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-31','ins_enumeracion'=>31,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>2,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA MAPRIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-32','ins_enumeracion'=>32,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>4,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA MAPRIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-33','ins_enumeracion'=>33,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>6,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA MAPRIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-34','ins_enumeracion'=>34,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>10,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA MAPRIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-35','ins_enumeracion'=>35,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>14,'ins_peso_presen'=>'25323','ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-36','ins_enumeracion'=>36,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>16,'ins_peso_presen'=>'7116','ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-37','ins_enumeracion'=>37,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>14,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-38','ins_enumeracion'=>38,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>17,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-39','ins_enumeracion'=>39,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>12,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-40','ins_enumeracion'=>40,'ins_id_tip_ins'=>4,'ins_id_part'=>1,'ins_id_uni'=>7,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'ESENCIAS MIX','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-41','ins_enumeracion'=>41,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'KG','ins_desc'=>'TOSTADO DE HABA PELADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-42','ins_enumeracion'=>42,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'KG','ins_desc'=>'TOSTADO DE MAIZ','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-43','ins_enumeracion'=>43,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>'KG','ins_desc'=>'TOSTADO DE MANI ENTERO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-44','ins_enumeracion'=>44,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'VITAMINA A PALMITATO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-45','ins_enumeracion'=>45,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>2,'ins_peso_presen'=>null,'ins_desc'=>'FRUTAS EN ALMIBAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-46','ins_enumeracion'=>46,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>4,'ins_peso_presen'=>null,'ins_desc'=>'FRUTAS EN ALMIBAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-47','ins_enumeracion'=>47,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>6,'ins_peso_presen'=>null,'ins_desc'=>'FRUTAS EN ALMIBAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-48','ins_enumeracion'=>48,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>16,'ins_peso_presen'=>null,'ins_desc'=>'FRUTAS EN ALMIBAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-49','ins_enumeracion'=>49,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'FRUTILLAS EN ALMIBAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-50','ins_enumeracion'=>50,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'GELATINA NEUTRA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-51','ins_enumeracion'=>51,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_id_sabor'=>null,'ins_id_sabor'=>null,'ins_peso_presen'=>null,'ins_desc'=>'HARINA DE LINAZA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-52','ins_enumeracion'=>52,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>9,'ins_desc'=>'HARINA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-53','ins_enumeracion'=>53,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>19,'ins_desc'=>'HARINA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-54','ins_enumeracion'=>54,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>20,'ins_desc'=>'HARINA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-55','ins_enumeracion'=>55,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'HUEVO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-56','ins_enumeracion'=>56,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500 GR','ins_id_sabor'=>null,'ins_desc'=>'LAVADURA FRESCA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-57','ins_enumeracion'=>57,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'LECHE  EN  POLVO  ENTERA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-58','ins_enumeracion'=>58,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'LEVADURA DE CERVEZA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-59','ins_enumeracion'=>59,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500 GR','ins_id_sabor'=>null,'ins_desc'=>'LEVADURA SECA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-60','ins_enumeracion'=>60,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'MEJORADOR DE MASA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-61','ins_enumeracion'=>61,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'LICUADO','ins_id_sabor'=>7,'ins_desc'=>'MERMELADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-62','ins_enumeracion'=>62,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>16,'ins_desc'=>'MERMELADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-63','ins_enumeracion'=>63,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>4,'ins_desc'=>'MERMELADA LICUADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-64','ins_enumeracion'=>64,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>7,'ins_desc'=>'MERMELADA LICUADA DE FRUTAS Y VERDURAS','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-65','ins_enumeracion'=>65,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>6,'ins_desc'=>'MERMELADA LICUADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-66','ins_enumeracion'=>66,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'PASAS','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-67','ins_enumeracion'=>67,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'POLEN DE ABEJA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-68','ins_enumeracion'=>68,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'POLVO DE CACAO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-69','ins_enumeracion'=>69,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>4,'ins_desc'=>'PULPA CONCENTRADO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-70','ins_enumeracion'=>70,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>10,'ins_desc'=>'PULPA CONCENTRADO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-71','ins_enumeracion'=>71,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>8,'ins_desc'=>'PULPA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-72','ins_enumeracion'=>72,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>10,'ins_desc'=>'PULPA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-73','ins_enumeracion'=>73,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>15,'ins_desc'=>'PULPA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-74','ins_enumeracion'=>74,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>11,'ins_desc'=>'PULPA CONCENTRADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-75','ins_enumeracion'=>75,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>11,'ins_desc'=>'PULPA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-76','ins_enumeracion'=>76,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>16,'ins_desc'=>'PULPA AROMATIZADA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-77','ins_enumeracion'=>77,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'SAL DE MESA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-78','ins_enumeracion'=>78,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'SORBATO DE POTASIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'INS-79','ins_enumeracion'=>79,'ins_id_tip_ins'=>1,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'SUERO DE LECHE EN POLVO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-1','ins_enumeracion'=>1,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500G','ins_id_sabor'=>null,'ins_desc'=>'BOBINA  ALMENDRA MOLIDA ','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-2','ins_enumeracion'=>2,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'150 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA  BEBIDA LACTEA GENERICA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-3','ins_enumeracion'=>3,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LITRO','ins_id_sabor'=>null,'ins_desc'=>'BOBINA  DE LECHE ENTERA COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-4','ins_enumeracion'=>4,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'140 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA  LECHE SABOR FRUTILLA COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-5','ins_enumeracion'=>5,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'250G','ins_id_sabor'=>null,'ins_id_sabor'=>null,'ins_desc'=>'BOBINA ALMENDRA ENTERA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-6','ins_enumeracion'=>6,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'150 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA BEBIDA LACTEA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-7','ins_enumeracion'=>7,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'230GR','ins_id_sabor'=>null,'ins_desc'=>'BOBINA CEREAL EXTRUIDO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-8','ins_enumeracion'=>8,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500GR','ins_id_sabor'=>null,'ins_desc'=>'BOBINA CEREAL EXTRUIDO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-9','ins_enumeracion'=>9,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'120 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA DE YOGURT BEBIBLE SABOR DURAZNO COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-10','ins_enumeracion'=>10,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'120 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA DE YOGURT BEBIBLE SABOR MORA COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-11','ins_enumeracion'=>11,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'120 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA DESAYUNO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-12','ins_enumeracion'=>12,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'150 ML','ins_id_sabor'=>null,'ins_desc'=>'BOBINA DESAYUNO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-13','ins_enumeracion'=>13,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500 ML','ins_id_sabor'=>null,'ins_desc'=>'BOTELLA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-14','ins_enumeracion'=>14,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>null,'ins_desc'=>'BOTELLA DE KUMIS','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-15','ins_enumeracion'=>15,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 CC','ins_id_sabor'=>null,'ins_desc'=>'BOTELLA PET','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-16','ins_enumeracion'=>16,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>2,'ins_desc'=>'BOTELLA YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-17','ins_enumeracion'=>17,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>4,'ins_desc'=>'BOTELLA YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-18','ins_enumeracion'=>18,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>6,'ins_desc'=>'BOTELLA YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-19','ins_enumeracion'=>19,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>10,'ins_desc'=>'BOTELLA YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-20','ins_enumeracion'=>20,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>13,'ins_desc'=>'BOTELLA YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-21','ins_enumeracion'=>21,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>2,'ins_peso_presen'=>'250GR','ins_id_sabor'=>null,'ins_desc'=>'CAJA DE CARTON','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-22','ins_enumeracion'=>22,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>2,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'CAJAS DE CARTON P/GALLETA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-23','ins_enumeracion'=>23,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>2,'ins_peso_presen'=>'15GR','ins_id_sabor'=>null,'ins_desc'=>'CAJITAS BESOS DE PANDO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-24','ins_enumeracion'=>24,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA DE PESO NETO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-25','ins_enumeracion'=>25,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA DE QUESO FUNDIDO SUBSIDIO-REDONDOS','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-26','ins_enumeracion'=>26,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LT','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA EN MANGA PARA KUMIS QUINUA SUBSIDIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-27','ins_enumeracion'=>27,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LT','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA EN MANGA PARA YOGURT BEBIBLE SUBSIDIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-28','ins_enumeracion'=>28,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LT','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA EN MANGA PARA YOGURT FRUTADO SUBSIDIO PRENATAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-29','ins_enumeracion'=>29,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LT','ins_id_sabor'=>18,'ins_desc'=>'ETIQUETA EN MANGA PARA YOGURT KUMIS  SUBSIDIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-30','ins_enumeracion'=>30,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LT','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA EN MANGA PARA YOGURT PROBIOTICO SUBSIDIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-31','ins_enumeracion'=>31,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'2L','ins_id_sabor'=>4,'ins_desc'=>'ETIQUETA NECTAR ACTIVIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-32','ins_enumeracion'=>32,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'2L','ins_id_sabor'=>10,'ins_desc'=>'ETIQUETA NECTAR ACTIVIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-33','ins_enumeracion'=>33,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>4,'ins_desc'=>'ETIQUETA NECTAR DE FRUTAS  ACTIVIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-34','ins_enumeracion'=>34,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>10,'ins_desc'=>'ETIQUETA NECTAR DE FRUTAS  ACTIVIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-35','ins_enumeracion'=>35,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'200 ML','ins_id_sabor'=>15,'ins_desc'=>'ETIQUETA NECTAR DE FRUTAS  ACTIVIDA','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-36','ins_enumeracion'=>36,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500 ML','ins_id_sabor'=>4,'ins_desc'=>'ETIQUETA NECTAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-37','ins_enumeracion'=>37,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500 ML','ins_id_sabor'=>10,'ins_desc'=>'ETIQUETA NECTAR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-38','ins_enumeracion'=>38,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'500 ML','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-39','ins_enumeracion'=>39,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 LT','ins_id_sabor'=>4,'ins_desc'=>'ETIQUETA YOGURT BEBIBLE SUBSIDIO T/MEDIANO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-40','ins_enumeracion'=>40,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETA YOGURT BEBILE GRANDE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-41','ins_enumeracion'=>41,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS DE QUESO CRIOLLO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-42','ins_enumeracion'=>42,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS DE QUESO EDAM  SUBSIDIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-43','ins_enumeracion'=>43,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS DE QUESO FUNDIDO COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-44','ins_enumeracion'=>44,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS DE QUESO PRENSADO SUBSIDIO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-45','ins_enumeracion'=>45,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>4,'ins_desc'=>'ETIQUETAS  LADO A','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-46','ins_enumeracion'=>46,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>4,'ins_desc'=>'ETIQUETAS  LADO B','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-47','ins_enumeracion'=>47,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'2 LITROS','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS JUGO DE  COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-48','ins_enumeracion'=>48,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS KUMIS','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-49','ins_enumeracion'=>49,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'1 L','ins_id_sabor'=>18,'ins_desc'=>'ETIQUETAS KUMIS  COMERCIAL','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-50','ins_enumeracion'=>50,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>10,'ins_desc'=>'ETIQUETAS  LADO A','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-51','ins_enumeracion'=>51,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>10,'ins_desc'=>'ETIQUETAS  LADO B','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-52','ins_enumeracion'=>52,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>14,'ins_desc'=>'ETIQUETAS  LADO A','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-53','ins_enumeracion'=>53,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>14,'ins_desc'=>'ETIQUETAS  LADO B','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-54','ins_enumeracion'=>54,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'2L (MILLAR)','ins_id_sabor'=>14,'ins_desc'=>'ETIQUETAS NECTAR DE FRUTA SABOR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-55','ins_enumeracion'=>55,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'2L (MILLAR)','ins_id_sabor'=>15,'ins_desc'=>'ETIQUETAS NECTAR DE FRUTA SABOR','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-56','ins_enumeracion'=>56,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'18 X 10.6','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-57','ins_enumeracion'=>57,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'25.5 X 7.3','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS YOGURT BEBIBLE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-58','ins_enumeracion'=>58,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'GOTAS 18X10.6 CMT','ins_id_sabor'=>null,'ins_desc'=>'ETIQUETAS YOGURT PROBIOTICO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-59','ins_enumeracion'=>59,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'C2000 U','ins_id_sabor'=>null,'ins_desc'=>'TAPA COLOR AMARILLO 627 PEAD','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-60','ins_enumeracion'=>60,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'C2000 U','ins_id_sabor'=>null,'ins_desc'=>'TAPA COLOR ROJO 627 PEAD 1797','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-61','ins_enumeracion'=>61,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'C2000 U','ins_id_sabor'=>null,'ins_desc'=>'TAPA COLOR VERDE 627 PEAD 356','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-62','ins_enumeracion'=>62,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'TAPA P/BOTELLAS 200 ML AMARILLO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-63','ins_enumeracion'=>63,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'TAPA P/BOTELLAS 200 ML CELESTE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-64','ins_enumeracion'=>64,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'TAPA P/BOTELLAS 200 ML VERDE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-65','ins_enumeracion'=>65,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'TAPA PET','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-66','ins_enumeracion'=>66,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'MILLAR','ins_id_sabor'=>null,'ins_desc'=>'TAPA PET AMARILLO CERDITO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-67','ins_enumeracion'=>67,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'MILLAR','ins_id_sabor'=>null,'ins_desc'=>'TAPA PET AMARILLO OSOS','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-68','ins_enumeracion'=>68,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'MILLAR','ins_id_sabor'=>null,'ins_desc'=>'TAPA PET VERDE CLARO ELEFANTES','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-69','ins_enumeracion'=>69,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'MILLAR','ins_id_sabor'=>null,'ins_desc'=>'TAPA PET VERDE CLARO MONITO ','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-70','ins_enumeracion'=>70,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>null,'ins_id_sabor'=>null,'ins_desc'=>'TAPAS BLANCAS DE QUESO FUNDIDO NUEVO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-71','ins_enumeracion'=>71,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'KG','ins_id_sabor'=>null,'ins_desc'=>'TAPAS DE YOGURT KUMIS NATURAL  C/CELESTE','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-72','ins_enumeracion'=>72,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'KG','ins_id_sabor'=>null,'ins_desc'=>'TAPAS DE YOGURT SABORIZADO FRUTILLA  C/ROJO','ins_usr_id'=>1,'ins_id_planta'=>1],
            ['ins_codigo'=>'ENV-73','ins_enumeracion'=>73,'ins_id_tip_ins'=>2,'ins_id_part'=>1,'ins_id_uni'=>6,'ins_peso_presen'=>'KG','ins_id_sabor'=>null,'ins_desc'=>'TAPAS DE YOGURT SABORIZADO MORA  C/VIOLETA','ins_usr_id'=>1,'ins_id_planta'=>1],
        ];
        foreach($insumos as $insumo)
        {
            Insumo::create($insumo);
        }
    }
}
