<?php
    /*
	Plugin Name: B-TopBar
	Plugin URI: https://bimboto.org/b_topbar
	Description: permet d'avoir les infos du user connecté
	Version 0.1
	Author: benny nkonga 
	Author URI: https://bimboto.org
	*/
	
	add_action('check_admin_referer', 'logout_no_confirmation', 10, 2);
    function logout_no_confirmation($action, $result){
        /**
        * Allow logout without confirmation
        */
        if ($action == "log-out" && !isset($_GET['_wpnonce'])):
            $redirectUrl = 'https://vitracia.com'; 
            wp_redirect( str_replace( '&', '&', wp_logout_url( $redirectUrl.'?logout=true' ) ) );
            exit;
        endif;
    }

	function get_parent_id_nomenclature(){
	    return "xxdrdf-dgeb-paedfe";
	}
	function generate_user_unique_key($lenght = 13) {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }

	function b_bars_get_logo_url(){
	    return get_bloginfo("url") . "/wp-content/uploads/2020/10/logo-icash-black-2.png";
	}
	function b_bars_rediriger($url){
	    echo "<script> rediriger_vers($url);</script>";
	}
	add_shortcode("set_bar", "bimboto_header");
	function bimboto_header(){

		if(!is_user_logged_in()){
			$menu	=	"<a  href='reglementation' class='dropdown' id='dropmenu' >
							<i class='dropdown fas fa-book-reader' style='color:darkyellow'></i>
						 </a>";
		}else{
			$menu = "<a  href='#menu' class='dropdown' id='dropmenu' onclick='showMenu();'>
						<i class='dropdown fas fa-bars'></i>
					 </a>";
		}

		echo $menu;
	}

	add_shortcode("menu", "menu_yangoyo");
	function menu_yangoyo(){
		if(!is_user_logged_in())
			return;
		
		$historique	=	"<li>
							<a href='historique'>
								<i class='fas fa-table'></i>
								Historique
							</a>
						</li>";

		$vodacom	=	"<li>
							<a href='envoie-achat?reseau=vodacom'>
								<i class='fas fa-plus'></i>
								Acheter pour VODACOM
							</a>
						 </li>";
		$airtel	=	"<li>
							<a href='envoie-achat?reseau=airtel'>
								<i class='fas fa-plus'></i>
								Acheter pour AIRTEL
							</a>
						 </li>";
		$africel=	"<li>
							<a href='envoie-achat?reseau=africel'>
								<i class='fas fa-plus'></i>
								Acheter pour Africel
							</a>
						 </li>";
		$orange	=	"<li>
							<a href='envoie-achat?reseau=orange'>
								<i class='fas fa-plus'></i>
								Acheter pour ORANGE
							</a>
						 </li>";
		$logout		=	"<li>
							<a href='#'>
								<i class='fas fa-filter'></i>
								not yet defined
							</a>
						 </li>";
		$rechercher	=	"<li>
							<a href='#'>
								<i class='fas fa-filter'></i>
								Rechercher
							</a>
						 </li>";
		$menu	.=	"<div id='menu' class='oModal vitracia-menu'>
						<a href='#' id='closemenu'>X</a>
						<ul>
							$historique
							$vodacom
							$airtel
							$orange
							$africel
							$rechercher
							$logout
						</ul>
					</div>";		
		$css	=	"<style> 
						.vitracia-menu{
							top					: 110px;
							left				: 0;
							border-left			: 5px double gray;
						}
						ul{
							list-style			: none;
							margin				: 0;
							padding				: 0;
							
							vertical-aligne		: middle;
						}
						.vitracia-menu li{
							padding		: 10px;
							border-bottom	: 1px solid silver;
						}
						.vitracia-menu li a{
							color	: white;
							font-weight			: bold;
						}
						
						.vitracia-menu li i{
							color			: dodgerblue;
							font-size		: 20px;
							border-radius	: 10px;
							background-color: whitesmoke;
							padding			: 10px;
						}
						#closemenu{
							float			: right;
							font-size		: 16px;
							font-weght		: bold;
							font-familly	: gergia;
							color			: white;
							opacity			: 0.6;
							background-color: red;
							border-radius	: 10px;
							padding			: 15px;
							margin			: 5px;
							
						}
					 </style>";
		
		$menu = "$menu $css";
		echo $menu;
	}
	add_shortcode("menu_new_mobile","menu_new_mobile");
	add_shortcode("menu_new_large","menu_new_large");
	function css_menu_new_large(){
	    $css    =   "<style>
	                    nav.menu-large{
	                        width: 100%;
	                        margin: 0 auto;
	                        background-color: white;
	                        position: sticky;
	                        top: 0px;
	                    }
	                    nav.menu-large *{
	                        margin: 0px;
	                        padding: 0px;
	                    }
	                    nav.menu-large h1.logo, nav.menu-large ul{
	                        display: inline-block;
	                    }
	                    nav.menu-large h1.logo{
	                        font-family: 'rock salt, calibri';
	                    }
	                    nav.menu-large ul{
	                        list-style-type: none;
	                        position: relative;
	                        top: 10px;
	                        width: 70%;
	                    }
	                    nav.menu-large ul li{
	                        float : left;
	                        width: 20%;
	                        text-align: center;
	                        position: relative;
	                    }
	                    nav.menu-large ul::after{
	                        content: '';
	                        display: table;
	                        clear: both;
	                    }
	                    nav.menu-large a{
	                        display: block;
	                        text-decoration: none;
	                        color: black;
	                        border-bottom: 2px solid transparent;
	                        padding: 10px 0px;
	                    }
	                    nav.menu-large a:hover{
	                        color: orange;
	                        border-bottom: 2px solid gold;
	                    }
	                    nav.menu-large > ul li:hover .sous{
	                        display: block;
	                    }
	                    nav.menu-large li.deroulant-sous:hover .sous-sous{
	                        display: block;
	                    }
	                    nav.menu-large .sous, nav.menu-large .sous-sous{
	                        border-top:2px solid gold;
	                        display: none;
	                        box-shadow: 0px 1px 2px #ccc;
	                        background-color: white;
	                        position: absolute;
	                        top: 42px;
	                        width: 100%;
	                        z-index: 2000;
	                    }
	                    nav.menu-large .sous-sous{
	                        left: 100%;
	                        top: 0px;
	                    }
	                    nav.menu-large .sous li, .sous-sous{
	                        float: none;
	                        width: 100%;
	                        text-align: left;
	                    }
	                    nav.menu-large .sous a{
	                        padding: 10px;
	                        border-bottom: none;
	                    }
	                    nav.menu-large .sous a:hover, .sous-sous{
	                        border-bottom: none;
	                        background-color: RGBa(200,200,200,0.1);
	                    }
	                    .deroulant > a::after{
	                        content: '▼';
	                        font-size: 12px;
	                    }
	                    nav.menu-large ul li.deroulant:hover > a::after{
	                        content: '▲';
	                        font-size: 12px
	                    }
	                    .deroulant-sous >a::after{
	                        content: '►';
	                        font-size: 12px;
	                    }
	                     nav.menu-large ul li.deroulant-sous:hover > a::after{
	                        content: '◄';
	                        font-size: 12px
	                    }
	                    li.btn{
	                        background-color: gold;
	                        border-radius: 10px;
	                        color: white;
	                        font-weight: bold;
	                    }
	                    li.btn > a:hover{
	                        border-bottom: 2px solid transparent;
	                        color: white;
	                        
	                    }
	                 </style>";
	    return $css;
	}
	function menu_new_large(){
	    if(is_user_logged_in()){
	        $logout_url =   wp_logout_url();

	        $user_name = wp_get_current_user()->display_name;
	        $zone_achat =   "<li class='deroulant-sous'>
	                            <a href='#'>
	                                <i class='fa fa-shopping-cart'></i>
	                                Achat crédit
	                            </a>
	                            <ul class='sous-sous'>
	                                <li>
	                                    <a href='https://vitracia.com/achat-credit?reseau=vodacom'>Vodacom</a>
	                                </li>
	                                <li>
	                                    <a href='https://vitracia.com/achat-credit?reseau=airtel'>Airtel</a>
	                                </li>
	                                <li>
	                                    <a href='https://vitracia.com/achat-credit?reseau=orange'>Orange</a>
	                                </li>
	                                <li>
	                                    <a href='https://vitracia.com/achat-credit?reseau=africel'>Africel</a>
	                                </li>
	                            </ul>
	                         <li>";
	                         
	        $zone_user  =   "<li class='deroulante btn'>
	                            <a href='#'>
	                                <i class='fa fa-tachometer' aria-hidden='true'></i>
	                                $user_name
	                            </a>
	                            <ul class='sous'>
	                                <li>
	                                    <a href='/my-account'>
	                                        <i class='fa fa-user-circle-o'></i>
	                                        Mon Compte
	                                    </a>
	                                    <a href='/history'>
	                                        <i class='fas fa-table'></i>
	                                        Mon Historique
	                                    </a>
	                                    $zone_achat
	                                    <a href='javascript::void(0);' onclick=\"document.location='$logout_url'\">
	                                        <i class='fas fa-power-off'></i>
	                                        Se déconnecter
	                                    </a>
	                                </li>
	                            </ul>
	                         </li>";
	    }
	    else{
	        $connexion  =   "<li class='btn'>
	                            <a href='/login-page'>
	                                <i class='fas fa-power-on'></i>
	                                Connexion
	                            </a>
	                         </li>";
	    }
	    $menu   =   "<nav class='menu-large'>
	                    <h1 class='logo'>Vitracia</h1>
	                    <ul>
	                        <li>
	                            <a href='https://vitracia.com'>Accueil</a>
	                        </li>
	                        <li>
	                            <a href='/contact-us'>Contact</a>
	                        </li>
	                        $zone_user
	                        $connexion
	                    </ul>
	                 </nav>";
	    $css    =   css_menu_new_large();
	    echo "$css $menu";
	}
	function css_menu_new_mobile(){
	    
	    $css    =   "<style>
                        body {
                          font-family: 'Lato', sans-serif;
                          transition: background-color .5s;
                        }
                        
                        #menu-head{
                            display: block;
                            width: 100%;
                            padding: 10px;
                        }
                        #menu-head *{
                            display: inline-block;
                            cursor: pointer;
                        }
                        #toggle-menu{
                            color: black;
                            font-weight: bold;
                            font-size: 50px;
                            margin-right: 10px;
                            
                        }
                        .logo{
                            font-family: 'rock salt';
                            font-size: 50px;
                            font-weight: bold;
                            color: #cccc00;
                        }
                        main i{
                            font-style: italic;
                            font-weight: bold;
                        }
                        .sidenav {
                          height: 100%;
                          width: 0;
                          position: fixed;
                          z-index: 1;
                          top: 0;
                          left: 0;
                          background-color: #111;
                          overflow-x: hidden;
                          transition: 0.5s;
                          padding-top: 60px;
                        }
                        
                        .sidenav a, .dropdown-btn{
                          padding: 8px 8px 8px 32px;
                          text-decoration: none;
                          font-size: 25px;
                          color: #818181;
                          display: block;
                          transition: 0.3s;
                          font-weight: normal;
                        }
                        .dropdown-btn:hover , .sidenav a:hover{
                            background-color: #D1C11F;
                            color: white;
                            color: #818181;
                        }
                        
                        .sidenav a:hover {
                          color: #f1f1f1;
                        }
                        
                        .sidenav .closebtn {
                          position: absolute;
                          top: 0;
                          right: 25px;
                          font-size: 36px;
                          margin-left: 50px;
                        }
                        
                        #main {
                          transition: margin-left .5s;
                          padding: 16px;
                        }
                        
                        .dropdown-container, .dropdown-container-sous {
                          display: none;
                          background-color: #262626;
                          padding-left: 8px;
                        }
                        .fa-caret-down {
                          float: right;
                          padding-right: 8px;
                        }
                        @media screen and (max-height: 450px) {
                          .sidenav {padding-top: 15px;}
                          .sidenav a {font-size: 18px;}
                        }
                    </style>";
	    return $css;
	}
	function js_menu_new_mobile(){
	    $js =   "<script>
                        
                        document.getElementById('toggle-menu').addEventListener('click', openNav);
                        
                        function openNav() {
                          document.getElementById('mySidenav').style.width = '250px';
                          document.getElementById('main').style.marginLeft = '250px';
                          document.body.style.backgroundColor = 'rgba(0,0,0,0.4)';
                        }
                        
                        function closeNav() {
                          document.getElementById('mySidenav').style.width = '0';
                          document.getElementById('main').style.marginLeft= '0';
                          document.body.style.backgroundColor = 'white';
                        }
                        
                        var dropdown = document.getElementsByClassName('dropdown-btn');
                        var i;
                        
                        for (i = 0; i < dropdown.length; i++) {
                          dropdown[i].addEventListener('click', function() {
                          this.classList.toggle('active');
                          var dropdownContent = this.nextElementSibling;
                          if (dropdownContent.style.display === 'block') {
                          dropdownContent.style.display = 'none';
                          } else {
                          dropdownContent.style.display = 'block';
                          }
                          });
                        }
                    </script>";
	    return $js;
	}
	function menu_new_mobile(){
	    $user_name = wp_get_current_user()->display_name;
	    $logout_url =   wp_logout_url(get_permalink());
        if(is_user_logged_in()){
            $zone_user  =   "<a href='javascript::void(0);' class='dropdown-btn'>
                                <i class='fa fa-tachometer' aria-hidden='true'></i>$user_name 
                              </a>
                              <div class='dropdown-container'>
                              <a href='/my-account'>
                                    <i class='fa fa-user-circle-o' aria-hidden='true'></i>
                                    Mon compte
                                </a>
                                <a href='history'>
                                    <i class='fa fa-history' aria-hidden='true'></i>
                                    Historique
                                </a>
                                <a href='javascript::void(0);' class='dropdown-btn'>
                                    <i class='fa fa-shopping-cart' aria-hidden='true'></i>
                                    Achat crédit
                                </a>
                                <div class='dropdown-container-sous'>
                                    <a href='https://vitracia.com/achat-credit?reseau=vodacom'>Vodacom</a>
                                    <a href='https://vitracia.com/achat-credit?reseau=airtel'>Airtel</a>
                                    <a href='https://vitracia.com/achat-credit?reseau=orange'>Orange</a>
                                    <a href='https://vitracia.com/achat-credit?reseau=africel'>Africel</a>
                                </div>
                                <a href='javascript::void(0);' onclick=\"document.location='$logout_url'\">
                                    <i class='fas fa-power-off' aria-hidden='true'></i>
                                    Se déconnecter
                                </a>
                                
                              </div>";
        }
        else{
            $connexion  =   "<a href='/login-page'> Connexion</a>";
        }
	    
	    $toggle =   "<div id='menu-head'>
	                    <i class='fas fa-bars' id='toggle-menu'></i>
	                    <a class='logo' href='/'>Vitracia</a>
	                 </div>";
	                 
	    $menu   =   "<div id='mySidenav' class='sidenav'>
                      <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
                      <a href='/'>Acueil</a>
                      <a href='/contact-us'>Contact</a>
                      
                      $zone_user
                      $connexion
                    </div>";
        $css    =   css_menu_new_mobile();
        $js     =   js_menu_new_mobile();
        echo "$toggle $menu $css $js";
	}
	
	function set_bar($atts = ""){
	    
	    //if a user is not ligged in than the function cannot continue
	    if(!is_user_logged_in())
	        return;
	        
	    
	    if($atts == "")
	        set_footer();
	    else{
	        $bar_type = $atts["type"];
	        if($bar_type == "head")
	            set_headbar();
	        else if($bar_type == "foot")
	            set_footbar();
	        else
	            print_erreur($bar_type);
	    }
	}
	
	function print_erreur($bar_type){
	    echo "<b>Ce type de bar n'est pas reconnu : \t $bar_type</b>";
	}
	function set_headbar(){
	    
	    global $wp;
        $current_page = add_query_arg( array(), $wp->request );
        
        $current_user = wp_get_current_user();
	    
	    $menu   = get_menu_div($current_user, $current_page);
	    $compte = get_compte_actif($current_user);
	    $headbar = "<div class=\"b-topbar\">
	                    $compte
	                    $menu
	               </div>";
	    
	    echo $headbar;
	    
	    
	}
		
	add_action("wp_head","my_bars_header");
	function my_bars_header()
	{
	    $css    = css_for_the_bars();
	    echo $css;
		
		bloc_modal_css();
		//css_form_achat();
		
		$js		= js_();
		echo $js;
	}
	
	function css_for_the_bars()
	{
		$logo_vitracia = b_bars_get_logo_url() ;
	    $css =  "<style> 
                    #bimboto-header{
						position		: fixed;
						top				: 0;
						left			: 0;
						z-index			: 1000;
                    }
                    #logo{
						width			: 70%;
						height			: 50px;
					}
                    a.dropdown{
                        display			: inline-block;
                    }
					a.dropdown{
						padding			: 5px;
						margin-top		: 10px;
					}
					i.dropdown{
						font-size: 50px;
						padding			: 10px;
						border-radius	: 10px;
						color			: black;
						background-color: whitesmoke;
					}
	             </style>";
	    return $css;
	}
	
	function css_form_achat(){
		$css =  "<style>
					form{
						padding			: 0;
						background-color: #C0C0C0E3;
						width           : 100%;
						border-radius   : 10px;
					}
					div#header{
						width			: 100%;
						background-color: #020F4D;
						padding			: 5px;
						border-radius	: 10px 10px 0 0;
					}
					div#header h1{
						font-size		: 20px;
						font-familly	: georgia;
						text-align		: center;
						color			: white;
						text-transform	: uppercase;
					}
					div#info-variable{
						position		: relative;
						top				: -1px;
						border-radius	: 0 0 10px 10px;
						text-align		: center;
					}
					div#info-variable div.variable{
						background-color: #b3b300;
						display			: inline-block;
						margin			: 0;
						border-radius	: 0 0 30% 30%;
						box-shadow		: 5x 5px 5px gray;
						
					}
					div#info-variable div.variable span{
						display			: block;
						color			: black;
						font-weight		: bold;
						text-transform	: uppercase;
						padding			: 3px;
					}
					div#info-variable div.variable span:not(.important){
						background-color: #666600;
					}
					div#main{
						background-color: whitesmoke;
						border			: 1px solid whitesmoke;
						padding			: 5px;
						padding-top		: 0;
					}
					div#footer{
						width			: 100%;
						background-color: #04187c;
						border-radius	:  0 0 10px 10px;
						opacity			: 0.8;
						padding			: 10px;
						text-align		: right;
					}
					div#footer button{
						-moz-appearance: none;
						-webkit-appearance: none;
						appearance		: none;
						padding			: 10px;
						margin-left		: 10px;
						border			: none;
						
						color			: white;
						border-radius	: 10px;
					}
					div#footer button#submit{
						background-color: darkgreen;
					}
					div#footer button#reset{
						background-color: darkred;
					}
					div#footer button i{
						font-size		: 13px;
						color: white;
						border-radius	: 10px;
						padding			: 5px;
						border-radius	: 30px;
					}
					div#footer button#submit i{
						background-color: green;
					}
					div#footer button#reset i{
						background-color: red;
					}
					.info-full{
						width			: 100%;
						background-color: transparent;
						maring			: 0;
						padding			: 0;
					}
					.info-full .infoe{
						width			: 70%;
						background-color: whitesmoke;
						width			: 200px;
						border-radius	: 5px 0 0 5px;
					}
					.info-full .value{
						width			: 20%;
						background-color: darkgray;
						position		: relative;
						left			: -6px;
						border-radius	: 0 5px 5px 0;
					}
					label{
						font-weight		: normal;
						margin-bottom	: 1px;
						display			: block;
					}
					input[type='submit']{
						background-color: darkgreen;
						color			: white;
						border-radius	: 5px;
						padding			: 5px;
					}
					input[type='reset']{
						background-color: darkred;
						border-radus	: 5px;
					}
					input[type='text'], input[type='number'], input[type='tel'] {
					    -moz-appearance: textfield;
						padding			: 5px;
						border			: none;
						border-bottom	: 1px solid silver;
						border-radius	: 5px;
					}
					input[type='text']:focus{
						border			: 2px solid silver;
					}
					
					/* Chrome, Safari, Edge, Opera */
					input::-webkit-outer-spin-button,
					input::-webkit-inner-spin-button {
					  -webkit-appearance: none;
					  margin: 0;
					}

					input:-moz-read-only{
						background-color: #cccc00;
						color			: black;
						font-familly	: georgia;
						font-weight		: bold;
					}
					input:read-only{
						background-color: #cccc00;
						color			: black;
						font-familly	: georgia;
						font-weight		: bold;
					}
					select{
						padding			: 5px;
						border			: none;
						select-style	: normal;
						cursor			: pointer;
						width			: 100%;
						height			: 33px;
						border-radius	: 5px;
						-moz-appearance: none;
						-webkit-appearance: none;
						appearance: none;
					}
					select:focus{
						border-bottom	: 2px solid silver;
					}
					
					.field{
						display			: inline-block;
						margin			: 1%;
						width			: 47%;
						background-color: transparent;
					}
					.configs{
						display			: inline-block;
						margin			: 1%;
						padding-left	: 3px;
						width			: 46%;
						background-color: #cccc00;
					}
					.config{
						display			: inline-block;
						padding-bottom	: 5px;
						width			: 100%;
						color			: black;
						font-weight		: bold;
						text-transform	: uppercase;
					}
					
					.valeur, .unite {
						padding			: 5px;
						display			: inline-block;
						margin			: none;
					}
					.valeur{
						color			: black;
						background-color: #cccc00;
						text-align		: right;
						font-weight		: bold;
						border-radius	: 5px 0 0 5px;
						margin			: none;
						width			: 79%;
						border-right	: 2px solid gray;
					}
					.unite{
						width			: 20%;
						float			: right;
						color			: white;
						margin			: none;
						//margin-left		: -5px;
						background-color: darkgray;
						font-familly	: georgia;
						border-radius	: 0 5px 5px 0;
						border-left		: 2px solid gray;
					}
					.numero_shop{
						display			: none;
					}
				 </style>";
		return $css;
	}
	
	function bloc_modal_css(){
		$css = "<style>
					/* CSS */
					.cf:before,
					.cf:after {
					  content:'';
					  display:table;
					}
					.cf:after {
					  clear:both;
					}

					.oModal {
						position: fixed;
						z-index: 99999;
						top: 0;
						right: 0;
						bottom: 0;
						left: 0;
						background: black;
						opacity:0;
						-webkit-transition: width 2s, opacity 400ms ease-in;
						-moz-transition: width 2s, opacity 400ms ease-in;
						transition: width 2s, opacity 400ms ease-in;
						pointer-events: none;
					}

					.oModal:target {
					  opacity:1;
					  pointer-events: auto;
					}

					.oModal:target > div {
					  transition: all 0.4s ease-in-out;
					  -moz-transition: all 0.4s ease-in-out;
					  -webkit-transition: all 0.4s ease-in-out;
					  
						border: 5px double silver;
						border-radius : 10px;
					}

					.oModal > div {
					  max-width: 600px;
					  position: relative;
					  margin: 1% auto;
					  padding: 0;
					  
					  background: #eee;
					  transition: all 0.4s ease-in-out;
					  -moz-transition: all 0.4s ease-in-out;
					  -webkit-transition: all 0.4s ease-in-out;
					  
					  border-radius: 15px;
					}
					
				</style>";

		echo $css;
	}

	function js_(){
		$js	=	"<script>
					
				 </script>";
		return $js;
	}
	
	function enregistrer_tableau_de_donnes_dans_base_de_donnees($table, $datas){

	    foreach($datas as $row){
	        $result =   save_to_db($table, $row);
	    }
	    
	    return $result;
	}
	function save_to_db($table, $datas){
	    global $wpdb;
	    $table  = "{$wpdb->prefix}$table";
	    $result =   $wpdb->insert($table, $datas);
	    return  $result;
	}
	
	function enregistrer_donnes_dans_base_de_donnees($table, $datas){
	    global $wpdb;
	    
	    $datas["user_login"] = wp_get_current_user()->user_login;
	    
	    $datas["date_achat"] = wp_date("Y-m-d");
	    
	    $result = save_to_db($table, $datas);
	    return $result;
	}
	add_shortcode("envoie_achat", "envoie_achat");
	function envoie_achat(){
	    
	    if(!empty($_POST)){
	        if(isset($_POST['confirmed'])){
	            
	        }else{
	            if(enregistrer_donnes_dans_base_de_donnees("achat", $_POST) == 1)
	            {
	               echo "<script> document.location='history';</script>";
	            }
	        }
	    }
		//on recupere le réseau
		$reseau = "vodacom";
		if(!empty($_GET) && isset($_GET["reseau"]) && !empty($_GET["reseau"])){
			$reseau	=	$_GET["reseau"];
		}
		
		$pointage["vodacom"] = 941;
		$pointage["orange"] = 920;
		$pointage["airtel"] = 910;
		$pointage["africel"] = 940;
		
		$pointage	= $pointage[$reseau];
		
		$taux	= 2020;
		$taux_remise	= 1.5;
		$montant		=	"<div class='field' >
								<label for='montant'>Montant</label>
								<input type='number' oninput='convertirMontant();' required value='10' name='montant' id='montant'  min='10' max='1000'/>
							 </div>";
		$conversion_cdf	=	"<div class='field'>
								<label>Converssion en CDF</label>
								<i id='montant_cdf' class='valeur'>00</i>
								<i class='unite'>Fc</i>
								
							 </div>";
		$remise			=	"<div class='field'>
								<label>Remise accordée</label>
								<i id='remise' class='valeur'>00</i>
								<i class='unite'>$</i>
							 </div>";
		$pointage_reseau=   "<input type='hidden' name='pointage_reseau' value='$pointage' readonly />";
		
		$taux_remise_input    =   "<input type='hidden' name='taux_remise' id='taux_remise_input' value='$taux_remise' readonly/>";
		$montant_remise =   "<input type='hidden' name='montant_remise' id='montant_remise' />";
		$conversion_cre	=	"<div class='field'>
								<label>Equivalent en crédit</label>
								<i id='montant_credit' class='valeur'>00</i>
								<i class='unite'>U</i>
							 </div>";
		$mode_paiement	=	"<div class='field'>
								<label class='information' for='mode_paiement'>Mode de paiement</label>
								<select required name='mode_paiement' id='mode_paiement' onchange='getShopNumber()' >
									<option value='MPESA'>MPESA</option>
									<option value='ORANGE MONEY'>ORANGE MONEY</option>
									<option value='AIRTEL MONEY'>AIRTEL MONEY</option>
									<option value='CASH' selected>CASH</option>
								</select>
							 </div>";
		$numero_shop		=	"<div class='field'>
								<label>Numéro du Shop</label>
								<i id='numero_shop' class='valeur'>Physique</i>
								<i class='unite'>><</i>
							 </div>";
		$numero_agence      = "<input name='numero_shop' id='numero_agence' type='hidden' value='Physique'/>";
		$numero_envoie  =	"<div class='field'>
								<label for='numero_envoie'>Numero d'envoie</label>
								<input type='tel' required minlength='9' maxlength='13' name='numero_envoie' id='numero_envoie' />
							 </div>";
		$numero_benefic	=	"<div class='field-full'>
								<label for='numero_beneficiaire'>Numero Bénéficiaire</label>
								<input type='tel' required minlength='9' maxlength='13' name='numero_beneficiaire' id='numero_beneficiaire' />
							 </div>";
		$id_transaction	=	"<div class='field'>
								<label for='id_transaction'> REFERENCE ID </label>
								<input type='text' required minlength='15' maxlength='15' name='id_transaction' id='id_transaction' />
							 </div>";
		
		$reseau_achat   =   "<input type='hidden' name='reseau' value='$reseau' readonly >";
		$titre			=	"acheter du crédit pour $reseau";
		
		$form   =   "<form class='form-achat' id='form_achat' action='#' method='post'>
						<div id='header'>
							<h1>$titre</h1>
						</div>
						
						<div id='main'>
						
							<div id='info-variable'>
							<div class='variable'>
								<span>taux échange</span>
								<span class='important' id='taux'>$taux</span>
							</div>
							<div class='variable' style='display: none;'>
								<span>pointage réseau</span>
								<span class='important' id='taux_pointage'>$pointage</span>
							</div>
							<div class='variable' style='display: none;'>
								<span>taux remise</span>
								<span class='important' id='taux_remise'>$taux_remise</span>
							</div>
							
							<span class='numero_shop'>0815490426</span>
							<span class='numero_shop'>0892170726</span>
							<span class='numero_shop'>0992863594</span>
							<span class='numero_shop'>Physique</span>
						</div>
						
							$montant
							$conversion_cdf
							$montant_again
							$conversion_cre
							$remise
							$mode_paiement
							$numero_shop
							$numero_envoie
							$id_transaction
							$numero_benefic
							$reseau_achat
							$numero_agence
							$montant_remise
							$taux_remise_input
							$pointage_reseau
						</div>
						
						<div id='footer'>
							<button type='submit' id='submit' value='enregistrer'/>
								<i class='fas fa-save'></i>
								Enregistrer
							</button>
							<button type='reset' id='reset' value='enregistrer'/>
								<i class='fas fa-refresh'></i>
								effacer tout
							</button>
						</div>
					</form>";
		$css = css_form_achat();
		echo "$form $css";
		
		echo js_pour_achat();
	}
	
	add_shortcode("form_login", "form_login");
	function login_user($log, $pwd){
	    $creds =    array(
                                'user_login'    => $login,
                                'user_password' => $mpd,
                                'remember'      => true
                            );
         
        $user = wp_signon( $creds, true );
        
        return $user;
	}
	function form_login(){
	    
	    if(!empty($_POST) && isset($_POST["signin"])){
	        //start to signin
	        //the post is full
	        extract($_POST);

	        $creds =    array(
                                'user_login'    => $login,
                                'user_password' => $mpd,
                                'remember'      => true
                            );
         
            $user = wp_signon( $creds, true );
 
            if (is_wp_error( $user ) ) {
                //error occured
                echo  $user->get_error_message();
            }else{
                wp_set_current_user($user->ID);
                echo "<script>document.location='https://vitracia.com/history';</script>";
            }
        }
	    
	    $form   =   "<form class='login-form' action='#' method='post'>
                        <div class='head'>
                            <h1>Connectez-vous</h1>
                            <i class='fas fa-user'></i>
                        </div>
                        <div class='body'>
                        <div class='field'>
                            <label>Nom d'utilisateur</label>
                            <input type='text' name='login' required/>
                        </div>
                        <div class='field'>
                            <label>Mot de passe</label>
                            <input type='password' name='mpd'required />
                        </div>
                        </div>
                        
                        <p>vous n'avez pas de compte? <br/> <a href='https://vitracia.com/signup-page'>enregistrez-vous</a> </p>
                        
                        <button type='submit'>connectez-vous</button>
                        <input type='hidden' name='signin'/>
                    </form>
                    
                    <style>
                        .login-form{
                            width: 100%;
                            height: 100%;
                            border-radius: 10px;
                            background-color: whitesmoke
                        }
                        .login-form .head{
                            height: 100px;
                            width: 100%;
                            background-color: #636A05;
                            padding-top: 10px;
                        }
                        .login-form .head *{
                            display: block;
                        }
                        .login-form h1{
                            text-align: center;
                            color: white;
                            //font-weight: bold;
                            text-transform: uppercase;
                        }
                        .login-form .head i{
                            text-align: center;
                            font-size: 50px;
                            background-color: skyblue;
                            width: 100px;
                            margin: auto;
                            padding: 20px;
                            padding-top: 10px;
                        }
                        .login-form div.body{
                            padding: 20px;
                            padding-top: 50px;
                            height: 60%;
                        }
                        .login-form .field{
                            margin: 5px;
                            margin-top: 10px;
                        }
                        
                        .login-form input{
                            border: none;
                            border-radius: 10px;
                            
                        }
                        .login-form label{
                            margin-top: 5px;
                            margin-bottom: -3p2;
                            font-weight: normal;
                            
                        }
                        button[type='submit']{
                            background-color:#A4AE21;
                            border-radius: 10px;
                            margin: 10px;
                            height: 35px;
                            padding: 10px;
                            padding-bottom: 30px;
                            width: 96%;
                            font-weight: normal;
                        }
                        button[type='submit']:hover{
                            background-color: #636A05;
                        }
                        .login-form p{
                            text-align: center;
                        }
                        .login-form p a{
                            color: #A4AE21;
                        }
                        .login-form p a:hover{
                            color: #A4BE21;
                            border-bottom: 3px double;
                        }
                    </style>";
                    
        echo $form;
	}
	add_shortcode("form_signup", "form_signup");
	function signup_form_old(){
	    $form   =   "<form class='login-form' action='#' method='post'>
                        <div class='head'>
                            <h1>s'enregistrez</h1>
                            <i class='fas fa-user-edit'></i>
                        </div>
                        
                        <div class='body'>
                            <div class='field fifty'>
                            <label>Nom</label>
                            <input type='text' name='first_name' placeholder='votre nom'/>
                        </div>
                        <div class='field fifty'>
                            <label>Téléphone</label>
                            <input type='text' name='phone' placeholder='votre tél perso.'/>
                        </div>
                            <div class='field fifty'>
                            <label>Votre Shop</label>
                            <input type='text' name='shopName' placeholder='le nom de votre shop'/>
                        </div>
                        <div class='field fifty'>
                            <label>Service du Shop</label>
                            <select type='text' name='shopName'>
                                <option>Multi service</option>
                                <option>Vente Crédit</option>
                                <option>Mobile Money</option>
                            </select>
                        </div>
                        <div class='field fifty'>
                            <label>Adresse</label>
                            <input type='text' name='shopAdresse' placeholder='12/mposo/Matonge' />
                        </div>
                        <div class='field fifty'>
                            <label>Commune</label>
                            <input type='text' name='commune' placeholder='ex: Kasa-vubu'/>
                        </div>
                        
                        <div class='field'>
                            <label>Nom d'utilisateur</label>
                            <input type='text' name='log' />
                        </div>
                        <div class='field fifty'>
                            <label>Mot de passe</label>
                            <input type='password' name='pwd' />
                        </div>
                        <div class='field fifty'>
                            <label>Repeter MPD</label>
                            <input type='password' name='pwd_confirm' />
                        </div>
                        </div>
                        
                        <p>vous avez déjà un compte? <br/> <a href='https://vitracia.com/login-page'>connectez-vous</a> </p>
                        <button type='submit'>créez votre compte</button>
                        
                        <input type='hidden' name='signup'/>
                    </form>";
	    return $form;
	}
	function signup_form(){
	    $parent_id_calling  =   get_parent_id_nomenclature();

	    if(!empty($_GET) && isset($_GET["$parent_id_calling"])){
	        $parent_id = $_GET["$parent_id_calling"];
	        
	        /*
	        if(!empty($parent_id) && !is_null($parent_id)){
	            $query_for_parentname   =   b_table_constituer_query("users", "display_name", "user_id='$parent_id'");
	            $parent_name            =   b_table_get_value($query_for_parentname);
	        }
	        */
	    }
	    
	    if(isset($parent_name))
	        $parent_name = "<br/>PARAINER PAR : $parent_name";
	    else{
	        $parent_tab =   "<div class='tab_group parainage'>
                                <h3>Vous avez un paraint?</h3>

                                <div class='field'>
                                    <label>l'ID du paraint (optionnel)</label>
                                    <input type='text' name='parent_id'>
                                </div>
                            </div>";
	    }
	    $form   =   "<form class='login-form' action='#' method='post'>
                        <div class='head'>
                            <h1>créer votre compte $parent_name</h1>
                            <i class='fas fa-user-edit'></i>
                        </div>
                        <div class='body'>
                            <div class='tab_group'>
                                <div class='title'>
                                    <h3>Votre identié</h3>
                                </div>
                                
                                <div class='field fifty'>
                                    <label>Nom</label>
                                    <input type='text' name='last_name' required>
                                </div>
                                <div class='field fifty'>
                                    <label>Prenom</label>
                                    <input type='text' name='first_name' required>
                                </div>
                                <div class='field fifty'>
                                    <label>Sexe</label>
                                    <select name='sexe'>
                                        <option value=''>Séléctionner</option>
                                        <option>Femme</option>
                                        <option>Homme</option>
                                    </select>
                                </div>
                                    <div class='field fifty'>
                                    <label>Téléphone</label>
                                    <input type='tel' name='phone' placeholder='ex: 0815490426'>
                                </div>
                            </div>
                            <div class='tab_group'>
                                <div class='title'>
                                    <h3>Votre Shop</h3>
                                </div>
                                
                                <div class='field fifty'>
                                    <label>Shop</label>
                                    <input type='text' name='shopName' required>
                                </div>
                                <div class='field fifty'>
                                    <label>Type de shop</label>
                                    <select name='typeShop'>
                                        <option value=''>Séléctionner</option>
                                        <option>Type1</option>
                                        <option>Type2</option>
                                        <option>Type3</option>
                                        <option>Type4</option>
                                    </select>
                                </div>
                                <div class='field fifty'>
                                    <label>Adresse</label>
                                    <input type='text' name='adresse' placeholder='ex: 12, kilimani, terminus'>
                                </div>
                                <div class='field fifty'>
                                    <label>Commune</label>
                                    <input type='text' name='commune' placeholder='ex: Lemba'>
                                </div>
                            </div>
                            <div class='tab_group'>
                                <div class='title'>
                                    <h3>Informations de connexion</h3>
                                </div>
                                
                                <div class='field'>
                                    <label>Nom d'utilisateur</label>
                                    <input type='text' name='log' required>
                                </div>
                                <div class='field fifty'>
                                    <label>Mot de passe</label>
                                    <input type='password' name='pwd' id='pwd'required>
                                </div>
                                <div class='field fifty'>
                                    <label>Confirmer PWD</label>
                                    <input type='password' id='pwd_confirm' required>
                                </div>
                            </div>
                        </div>
                        
                        $parent_tab
                        <br/>
                        <input type='hidden' name='signup'/>
                     </form>
                    <div class='foot'>
                        <button type='text' id='previous' onclick='nextPrev(-1);'>Précédent</button>
                        <button id='next' onclick='nextPrev(1);'>Suivant</button>
                    </div>";
	   return $form;
	}
	function css_signup(){
	    $css    =   "<style>
                        .login-form div.body div.tab_group{
                            display: none;
                        }
                        .login-form div.body div.tab_group.parainage{
                            text-align: center;
                        }
                        div.foot{
                            width: 100%;
                            height: 60px;
                            background-color: silver;
                            padding: 5px;
                            text-align: center;
                            border-radius: 0 0 10px 10px;
                        }
                        div.foot button{
                            text-decoration: none;
                            border-radius: 10px;
                            padding: 10px;
                            background-color: #636A05;
                            margin: 2px;
                            font-weight: normal;
                            font-size: 17px;
                        }
                        div.foot button:disabled{
                            background-color: darkgray;
                            cursor: not-allowed;
                        }
                        
                        div.foot button#previous{
                            position: relative;
                            float: left;
                        }
                        div.foot button#next{
                            position: relative;
                            float: right;
                        }
                        .login-form{
                            width: 100%;
                            height: 100%;
                            background-color: whitesmoke;
                        }
                        .login-form .head{
                            height: 100px;
                            width: 100%;
                            background-color: #636A05;
                            padding-top: 10px;
                        }
                        .login-form .head *{
                            display: block;
                        }
                        .login-form h1{
                            text-align: center;
                            color: white;
                            text-transform: uppercase;
                        }
                        .login-form .head i{
                            text-align: center;
                            font-size: 50px;
                            color: white;
                            background-color: skyblue;
                            width: 100px;
                            margin: auto;
                            padding: 20px;
                            padding-top: 10px;
                        }
                        .login-form div.body{
                            padding: 20px;
                            padding-top: 50px;
                        }
                        .login-form .field{
                            margin: 5px;
                            margin-top: 10px;
                        }
                        .login-form .field.fifty{
                            display: inline-block;
                            width: 45.5%;
                            
                        }
                        .login-form input, .login-form select{
                            border: 2px solid #A4AE21;
                            border-radius: 10px;
                        }
                        .login-form input:focus{
                            border: 2px solid dodgerblue;
                        }
                        .login-form label{
                            margin-top: 5px;
                            margin-bottom: -3px;
                            font-weight: normal;
                        }
                        button[type='submit']{
                            background-color:#A4AE21;
                            border-radius: 10px;
                            margin: 10px;
                            height: 35px;
                            padding: 10px;
                            padding-bottom: 30px;
                            width: 96%;
                            font-weight: normal;
                        }
                        button[type='submit']:hover{
                            background-color: #636A05;
                        }
                        .field select{
                            width: 100%;
                            border-radius: 10px;
                            border: none;
                            cursor: pointer;
                            background-color: #A4AE21;
                        }
                        
                        .login-form p{
                            text-align: center;
                        }
                        .login-form p a{
                            color: #A4AE21;
                        }
                        .login-form p a:hover{
                            color: #A4BE21;
                            border-bottom: 3px double;
                        }
                    </style>";
	    return $css;
	}
	function script_signup(){
	    $script =   "<script> 
	                    var current_tab_index = 0;
	                    var tabs = document.getElementsByClassName('tab_group');
                        nextPrev();
                        function nextPrev(direction = 0){
                            
                            current_tab_index += direction;
                            //deactivate the previous button if in the first tab
                            document.getElementById('previous').disabled = (current_tab_index === 0);
                            
                            //change the tet of button 'next' if in the last tab
                            if(current_tab_index === tabs.length -1){
                                document.getElementById('next').innerText = 'Enregistrer';
                                document.getElementById('next').style.backgroundColor = 'darkgreen';
                            }
                            else{
                                document.getElementById('next').innerText = 'Suivant';
                                document.getElementById('next').style.backgroundColor = '#636A05';
                            }
                            
                            
                            display_tab();
                        }
                        function display_tab(){

                            for(i = 0; i < tabs.length; i++){
                                tabs[i].style.display = 'none';
                            }
                                                        
                            if( current_tab_index >= tabs.length ){
                                document.getElementsByClassName('login-form')[0].submit();
                                return;
                            }
                            
                            tabs[current_tab_index].style.display = 'block';
                            
                            
                        }
                        
                     </script>";
                     
        return $script;
	}
	function register_user(){
	   
	    extract($_POST);
	    
	    $parent_id_calling  =   get_parent_id_nomenclature();
	    if(isset($parent_id)){
	        $query              =   b_table_constituer_query("own_users_metas", "meta_value", "(meta_key='$parent_id_calling') and (meta_value='$parent_id')");
	        $parent_id          =   b_table_get_value_from_database($query);
	    }
	        
	    
	    
	    if(!isset($parent_id) || is_null($parent_id) || empty($parent_id))
	        $parent_id = "nope";
     
        //creds
        $userdata["user_login"]     = $log;
        $userdata["user_pass"]      = $pwd;
        
        //identity
        $userdata["first_name"]     = $first_name;
        $userdata["last_name"]      = $last_name;
        $userdata["nickname"]       = "$first_name - $last_name";
        $userdata["display_name"]   = "$first_name - $last_name";
        $userdata["user_email"]     = "$log@yopmail.com";
        
        $user_id    =   wp_insert_user( $userdata );
        
        if(!is_wp_error($user_id)){
            $user_secure_id = generate_user_unique_key();
            
            $user_metas =   array(  array("user_id"=>$user_id,"meta_key"=>$parent_id_calling, "meta_value"=> $user_secure_id),
                                    array("user_id"=>$user_id,"meta_key"=> "telephone","meta_value"=>$phone),
                                    array("user_id"=>$user_id,"meta_key"=> "shop", "meta_value"=>$shopName ),
                                    array("user_id"=>$user_id,"meta_key"=> "typeShop","meta_value"=>$typeShop),
                                    array("user_id"=>$user_id,"meta_key"=> "adresse", "meta_value"=>$adresse ),
                                    array("user_id"=>$user_id,"meta_key"=> "commune", "meta_value"=>$commune),
                                    array("user_id"=>$user_id,"meta_key"=> "sexe", "meta_value"=>$sexe ),
                                    array("user_id"=>$user_id,"meta_key"=> "parent_id", "meta_value"=>$parent_id ));
            
            
            
            $result = enregistrer_tableau_de_donnes_dans_base_de_donnees("own_users_metas", $user_metas);
        }
        
        return $user_id;
        
        /*
        $user_metas["user_id"] = $user_id;
        $user_metas["$parent_id_calling"] = $user_secure_id;
        $user_metas["$parent_id_calling"] = $user_secure_id;
        $user_metas["$parent_id_calling"] = $user_secure_id;
        $user_metas["$parent_id_calling"] = $user_secure_id;
        
        
        add_user_meta($user_id, $parent_id_calling, $user_secure_id );
        add_user_meta($user_id, "telephone", $phone );
        add_user_meta($user_id, "shop", $shopName );
        add_user_meta($user_id, "typeShop", $typeShop);
        add_user_meta($user_id, "adresse", $adresse );
        add_user_meta($user_id, "commune", $commune);
        add_user_meta($user_id, "sexe", $sexe );
        
        $table_meta =   "own_users_metas";
        
        if(!is_null($id_parent))
            add_user_meta($user_id, "parent_id", "$parent_id_calling" );
        */
        
	}
	
	function form_signup(){
	    
	    if(!empty($_POST) && isset($_POST["signup"])){
	        
	        
	        $result = register_user();

	        if(!is_wp_error($result)){
	            login_user($_POST["log"], $_POST["pwd"]);
	            echo "USER REGISTERED SUCCESFULLY!!";
	            echo "<script> document.location='login-page'</script>";
	        }else{
	            echo "THERE WAS AN ERROR TRYING REGISTER USER";
	        }
	    }
	    $form_tab   =   signup_form();
	                     
        $form   =   signup_form_old();
                    
        $css    =   css_signup();
                    
        $script  =   script_signup();
                     
        echo "$form_tab $css $script";
	}
	
	function js_pour_achat(){
		$js	=	"<script>
					var taux = document.getElementById('taux').innerText;
					var taux_pointage = document.getElementById('taux_pointage').innerText;

					function convertirMontant(){
						var montant = document.getElementById('montant').value;
						document.getElementById('montant_cdf').innerText	= montant * taux;
						var credit = (montant / taux_pointage) * 100000;
						
						credit = parseInt(credit);
						document.getElementById('montant_credit').innerText = credit;
						
						var remise =  document.getElementById('taux_remise').innerText;
						remise = remise * montant / 100;
						document.getElementById('remise').innerText = remise ;
						document.getElementById('montant_remise').value = remise;
					}
					
					function getShopNumber(){
						var index = document.getElementById('mode_paiement').selectedIndex;
						var numero_shop = document.getElementsByClassName('numero_shop')[index].innerText;
						document.getElementById('numero_shop').innerText = numero_shop;
						document.getElementById('numero_agence').value = numero_shop;
					}
				 </script>" ;
		return $js;
	}
?>