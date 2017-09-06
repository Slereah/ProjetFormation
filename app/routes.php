<?php
	
	$w_routes = array(

		/* 
        *-- Home page
        */
		['GET', '/', 'Default#home', 'home'],

		/* 
        *-- Contact 
        */
    	['GET|POST', '/contactez-nous', 'Default#contact', 'contact'],

	  	/* 
        *-- Users
        */
        ['GET', '/profile', 'Users#index', 'profile'],

        /* 
        *-- Clothes
        */
        ['GET', '/personal-clothes', 'Clothes#indexPersonal', 'personal_clothes_index'],
        ['GET', '/default-clothes', 'Clothes#indexDefault', 'default_clothes_index'],
        ['GET|POST', '/search', 'Clothes#search', 'search'],
        ['GET|POST', '/clothes/create', 'Clothes#create', 'clothes_create'],
    	['GET', '/clothes/[i:id]', 'Clothes#read', 'clothes_read'],
    	['GET|POST', '/clothes/[i:id]/update', 'Clothes#update', 'clothes_update'],
    	['GET|POST', '/clothes/[i:id]/delete', 'Clothes#delete', 'clothes_delete'],

        ['GET', '/clothes/[i:id]/[i:idUser]/addWardrobe', 'Clothes#addToWardrobe', 'clothes_addW'],
        ['GET', '/clothes/[i:id]/[i:idUser]/deleteWardrobe', 'Clothes#deleteFromWardrobe', 'clothes_deleteW'],

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

