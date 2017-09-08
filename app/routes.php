<?php
	
	$w_routes = array(

		/* 
        *-- Home page
        */
		['GET', '/', 'Default#home', 'home'],
        ['GET|POST', '/update-weather', 'Default#updateWeather', 'update_weather'],


		/* 
        *-- Contact 
        */
    	['GET|POST', '/contact', 'Default#contact', 'contact'],

	  	/* 
        *-- Users
        */
        ['GET', '/profile', 'Users#index', 'profile'],
        ['GET|POST', '/user-update', 'Users#update', 'user_update'],
      	['GET|POST', '/user-delete', 'Users#delete', 'user_delete'],

        /* 
        *-- Clothes
        */
        ['GET', '/clothes', 'Clothes#index', 'clothes_index'],

        ['GET|POST', '/search', 'Clothes#search', 'search'],
        ['GET|POST', '/clothes/create', 'Clothes#create', 'clothes_create_admin'],
        ['GET|POST', '/clothes/[i:id]/create', 'Clothes#create', 'clothes_create'],
    	['GET', '/clothes/[i:id]', 'Clothes#read', 'clothes_read'],
        ['GET|POST', '/clothes/[i:id]/[i:idUser]/update', 'Clothes#update', 'clothes_update_user'],
    	['GET|POST', '/clothes/[i:id]/update', 'Clothes#update', 'clothes_update'],
        ['GET|POST', '/clothes/[i:id]/[i:idUser]/delete', 'Clothes#delete', 'clothes_delete_user'],
        ['GET|POST', '/clothes/[i:id]/delete', 'Clothes#delete', 'clothes_delete'],
        ['GET', '/clothes/[a:type]', 'Clothes#index', 'clothes_index_type'],
        ['GET', '/clothes/[i:id]/[i:idUser]/add', 'Clothes#addToWardrobe', 'clothes_addW'],
        ['GET', '/clothes/[i:id]/[i:idUser]/delete', 'Clothes#deleteFromWardrobe', 'clothes_deleteW'],

        /* 
        *-- Security (signin = s'identifier; signup = créer son compte)
        */
        ['GET|POST', '/signin', 'Security#signin', 'security_signin'],
        ['GET|POST', '/signup', 'Security#signup', 'security_signup'],
        ['GET|POST', '/logout', 'Security#logout', 'security_logout'],
        ['GET|POST', '/lost-password', 'Security#lostpwd', 'security_lost_pwd'],
        ['GET|POST', '/reset-password/[a:token]', 'Security#resetPwd', 'security_reset_pwd'],

        ['POST', '/upload', 'Default#uploadImage', 'upload'],



	);

