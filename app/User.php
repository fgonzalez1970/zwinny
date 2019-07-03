<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Artisan;
use App\Tenant;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $connection = 'mysql';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_temp','tenant_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function createSchema($schemaName,$idUser)
    {
        
        //tratamos primero de crear la base de datos y sus tablas respectivas
        try{ 
            DB::statement('CREATE DATABASE IF NOT EXISTS '.$schemaName);
        } catch (Illuminate\Database\QueryException $ex){ 
          return redirect()->route('/')->with('error','No se pudo crear la BD');
        }
        
        $host = getenv('HOST_DB');
        Config::set('database.connections.tenant', array(
            'driver'    => 'mysql',
            'host'      => $host,
            'database'  => $schemaName,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        //definimos la conexións

        DB::setDefaultConnection('tenant');

         /****************
          
          Sección Prospectos

         ************/

        //creamos tabla tipo de direccion
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m03_typesadresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla tipo de direccion
        DB::statement("INSERT INTO `t01m03_typesadresses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Principal', 'Dirección Principal', '2018-04-22 12:29:06', NULL),
    (2, 'Oficina Ppal', 'Oficina Principal', '2018-04-22 12:29:26', NULL),
    (3, 'Oficina sucursal', 'Oficina Secundario o Sucursal', '2018-04-22 12:29:57', NULL)");

        //creamos tabla tipo de redes
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m05_typesnetworks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla tipo de redes
        DB::statement("INSERT INTO `t01m05_typesnetworks` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Facebook', 'Facebook', NULL, NULL),
    (2, 'Twitter', 'Twitter', NULL, NULL),
    (3, 'Instagram', 'Instagram', NULL, NULL),
    (4, 'Linkedin', 'Linkedin', NULL, NULL)");

        //creamos la tabla de tipos de vivienda
        
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m04_typeslivplaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla tipos de vivienda
        DB::statement("INSERT INTO `t01m04_typeslivplaces` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Casa', 'Casa', NULL, NULL),
    (2, 'Apartamento', 'Apartamento', NULL, NULL),
    (3, 'Galpón', 'Galpón', NULL, NULL),
    (4, 'Bodega', 'Bodega', NULL, NULL);");


        //creamos la tabla de ramas o industrias
        
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m01_branchesleads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla ramas o tipo industrias
        DB::statement("INSERT INTO `t01m01_branchesleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Industrias del Plástico', 'Industrias del Plástico', '2018-05-21 12:23:24', NULL),
    (2, 'Tecnología', 'Tecnología', '2018-05-21 12:23:55', NULL)");

        //creamos la tabla de origen del prospecto
        
        DB::statement('CREATE TABLE IF NOT EXISTS `t01m02_sourcesleads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
        //llenamos la tabla origen del prospecto
        DB::statement("INSERT INTO `t01m02_sourcesleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Bd Externa', 'Bd Externa', '2018-04-22 12:26:03', NULL),
    (2, 'Web', 'Sitio Web', '2018-04-22 12:26:23', NULL),
    (3, 'Llamada Entrante', 'Llamada Entrante', '2018-04-22 12:26:51', NULL),
    (4, 'Recomendación', 'Recomendación de otro lead/cliente', '2018-04-22 12:27:23', NULL),
    (5, 'Google', 'Contacto Google', '2018-04-22 12:27:47', NULL),
    (6, 'Facebook', 'Contacto Facebook', '2018-04-22 12:28:09', NULL),
    (7, 'Twitter', 'Contacto Twitter', '2018-04-22 12:28:28', NULL)");

        //creamos la tabla status de prospecto
        DB::statement("CREATE TABLE IF NOT EXISTS `t01m10_statusleads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //llenamos la tabla status de prospecto
        DB::statement("INSERT INTO `t01m10_statusleads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Nueva Oportunidad', 'Ingresado en BD', '2018-06-10 12:22:24', '2018-06-10 12:22:26'),
    (2, 'Contactado', 'Contactado', '2018-06-10 12:23:13', '2018-06-10 12:23:14'),
    (3, 'Seguimiento', 'En seguimiento', '2018-06-10 12:23:39', '2018-06-10 12:23:40'),
    (4, 'Calificado', 'Paso a cliente', '2018-06-10 12:24:26', '2018-06-10 12:24:27'),
    (5, 'Cerrado', 'No aprovechable', '2018-06-10 12:25:23', '2018-06-10 12:25:23')");

        //creamos la tabla de prospectos
        DB::statement("CREATE TABLE IF NOT EXISTS `t01_leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) DEFAULT NULL,
  `id_cond_pay` int(11) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_branch` int(11) unsigned DEFAULT NULL,
  `code_lead` varchar(25) DEFAULT NULL,
  `name_lead` varchar(250) DEFAULT NULL,
  `lastname_lead` varchar(250) DEFAULT NULL,
  `email_lead` varchar(250) DEFAULT NULL,
  `birthdate_lead` timestamp NULL DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `contact_lead` varchar(15) DEFAULT NULL,
  `phone_fix` varchar(20) DEFAULT NULL,
  `phone_mobile` varchar(20) DEFAULT NULL,
  `address_txt` text,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `obs_lead` text NULL,
  `id_status` int(11) unsigned zerofill DEFAULT '1',
  `id_source` int(11) unsigned DEFAULT '0',
  `flag_owner` varchar(1) DEFAULT '0',
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_leads_statusleads` (`id_status`),
  KEY `FK_leads_branchesleads` (`id_branch`),
  KEY `FK_leads_sourcesleads` (`id_source`),
  CONSTRAINT `FK_leads_branchesleads` FOREIGN KEY (`id_branch`) REFERENCES `t01m01_branchesleads` (`id`),
  CONSTRAINT `FK_leads_statusleads` FOREIGN KEY (`id_status`) REFERENCES `t01m10_statusleads` (`id`),
  CONSTRAINT `FK_leads_sourcesleads` FOREIGN KEY (`id_source`) REFERENCES `t01m02_sourcesleads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //creamos la tabla de relaciones usuarios - leads
        
        DB::statement('CREATE TABLE IF NOT EXISTS `leads_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_lead` int(11) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

       //creamos la tabla de relaciones leads - status
       //para guardar los cambios de status del os leads 
        DB::statement('CREATE TABLE IF NOT EXISTS `lead_statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_lead` int(11) unsigned NOT NULL,
  `id_status` int(10) unsigned NOT NULL,
  `date_change` timestamp NULL DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        //llenamos la tabla de prospectos con datos de ejemplo
        //$lead = App\T01_lead::create(['name_lead' => '']);
        
    /****************
    
        Sección Activities (contacts)
  
    ************/

        //creamos la tabla fuentes de contactos
        DB::statement("CREATE TABLE IF NOT EXISTS `t02m11_sourcescontacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //llenamos la tabla de las fuentes de los contactos
       //español 
    /*DB::statement("INSERT INTO `t02m11_sourcescontacts` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Llamada', 'Llamada Telefónica', NULL, NULL),
    (2, 'Reunión', 'Reunión o entrevista', NULL, NULL),
    (3, 'Email', 'Correo Electrónico', NULL, NULL),
    (4, 'SMS', 'Mensaje de Texto', NULL, NULL),
    (5, 'Facebook', 'Facebook', NULL, NULL),
    (6, 'Twitter', 'Twitter', NULL, NULL),
    (7, 'Instagram', 'Instagram', NULL, NULL),
    (8, 'Sype', 'Skype', NULL, NULL);");*/

    //inglés 
        DB::statement("INSERT INTO `t02m11_sourcescontacts` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Call', 'Call phone', NULL, NULL),
    (2, 'Meeting', 'Meeting or interview', NULL, NULL),
    (3, 'Email', 'Mailing', NULL, NULL),
    (4, 'SMS', 'Texting', NULL, NULL),
    (5, 'Facebook', 'Facebook', NULL, NULL),
    (6, 'Twitter', 'Twitter', NULL, NULL),
    (7, 'Instagram', 'Instagram', NULL, NULL),
    (8, 'Sype', 'Skype', NULL, NULL),
    (9, 'Other', 'Other', NULL, NULL);");

        //creamos la tabla status de contactos
        DB::statement("CREATE TABLE IF NOT EXISTS `t02m12_statuscontacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //llenamos la tabla de los status de los contactos
        DB::statement("INSERT INTO `t02m12_statuscontacts` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 'Planificado', 'Contacto planificado', NULL, NULL),
    (2, 'Efectivo', 'Contacto efectivo', NULL, NULL),
    (3, 'No Efectivo', 'Contacto no efectivo', NULL, NULL);");
        
        //creamos la tabla resultados de los status de contactos
        DB::statement("CREATE TABLE IF NOT EXISTS `t02m13_resultscontacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_statuscont` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

      //llenamos la tabla de las resultados de los contactos
        DB::statement("INSERT INTO `t02m13_resultscontacts` (`id`, `id_statuscont`, `name`, `description`, `created_at`, `updated_at`) VALUES
    (1, 3, 'Cortada', 'Cortada', NULL, NULL),
    (2, 3, 'Ocupada', 'Tono ocupada', NULL, NULL),
    (3, 3, 'Rechazada', 'Rechazada por la persona', NULL, NULL),
    (4, 3, 'Identificador Erróneo', 'Num, nick, email, id, etc erróneo', NULL, NULL),
    (5, 2, 'Concretada', 'Actividad Concretada y finalizado', NULL, NULL), 
    (6, 1, 'Por Ejecutar', 'Planeada por ejectutar', NULL, NULL);");

         //creamos la tabla de contactos
        DB::statement("CREATE TABLE IF NOT EXISTS `t02_contacts` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `subject` varchar(255) NOT NULL,
  `date` timestamp NULL,
  `flag_prog` varchar(1) NOT NULL,
  `id_way` varchar(1) NOT NULL,
  `id_source` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_result` int(11) NOT NULL,
  `duration_hr` time NULL,
  `duration_seg` time NULL,
  `time_ini` time NULL,
  `time_fin` time NULL,
  `id_lead` int(11) NOT NULL,
  `desc_contact` text NULL,
  `action` text NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    /****************
    
        Sección Locations/Devices
  
    ************/
        //creamos la tabla de localidades para los dispositivos
        DB::statement("CREATE TABLE IF NOT EXISTS `iot_locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `coordinates` varchar(255) NOT NULL,
  `radius` decimal(10,2) NOT NULL,
  `date_up` timestamp NULL DEFAULT NULL,
  `date_down` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

        //creamos la tabla de relaciones devices - locations
        
        DB::statement('CREATE TABLE IF NOT EXISTS `iot_locations_devices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_location` int(11) unsigned NOT NULL,
  `id_device` int(10) unsigned NOT NULL,
  `date_up` timestamp NULL DEFAULT NULL,
  `date_down` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

    }//function createSchema 

    function selectSchemaTnt($schemaName)
    {
      $host = getenv('HOST_DB');
       //configuramos la conexión
        Config::set('database.connections.tenant', array(
            'driver'    => 'mysql',
            'host'      => $host,
            'database'  => $schemaName,
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));

        DB::setDefaultConnection('tenant');
    }

    function selectSchemaGral()
    {
       //configuramos la conexión
        $host = getenv('HOST_DB');
         Config::set('database.connections.crm_zwinny', array(
            'driver'    => 'mysql',
            'host'      => $host,
            'database'  => 'crm_zwinny',
            'username'  => 'crm_zwinny',
            'password'  => '2018gdl',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ));
       DB::setDefaultConnection('crm_zwinny');
    }

    function asignaTenantId($idTenant)
    {
        $this->tenant_id = $idTenant;
        $this->save();
    }

    function createProfile()
    {
        $profile = new Profile;
        $profile->user_id= $this->id;
        $profile->name = $this->name;
        $profile->created_at=$this->created_at;
        $profile->save();
    }

    function desencriptar($texto){
      $decrypted = base64_decode($texto);
      return $decrypted;
    }

    function encriptar($texto){
      $encrypted = base64_encode($texto);
      return $encrypted;
    }

    function getFirstRoleName(){
      //dd($this->belongsToMany('Caffeinated\Shinobi\Models\Role')->first());
      $role = $this->belongsToMany('Caffeinated\Shinobi\Models\Role')->first();
      //dd($role->slug);
      return $role->slug;
    }
}
