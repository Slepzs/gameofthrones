<?php

$name = array(1=>"Ollie",2=>"Marlena",3=>"Ira",4=>"Kandra",5=>"Stephane",6=>"Reynaldo",7=>"Samara",8=>"Ruthe",9=>"Romaine",10=>"Tiara",11=>"Birgit",12=>"Roni",13=>"Britta",
14=>"Odell",15=>"Cleveland",16=>"Cecille",17=>"Yuri",18=>"Lavina",
19=>"Stacee",20=>"Angelo",21=>"Heather",22=>"Giuseppina",23=>"Jake",24=>"Raleigh",25=>"Kathline",26=>"Roberto",27=>"Terina",28=>"Booker",29=>"Phillis",30=>"Bryce",31=>"Consuela",
32=>"Angel",33=>"Tawna",34=>"Linnea",35=>"Flossie"
,36=>"Cindie",37=>"Xiao",381=>"Junko",39=>"Marisha",40=>"Kathaleen",41=>"Raymon",42=>"Polly",43=>"Kathern",44=>"Lashay",45=>"Eduardo",46=>"Kenton",47=>"Myrtle",48=>"Jerrell",49=>"Jule",50=>"Javier");
 ?>
</head>
    <body>
      <header>
        <nav class='navbar navbar-default customnav'>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-8 col-md-12 col-lg-12">
                <ul class='nav navbar-nav navbar-right'>
                  <li class='Nav-li'><a href="frontpage.php">ALL Characters</a></li>
                  <li class='Nav-li'><a href="acc.php?id=<?=$_SESSION['s_id'] ?>"><?= $name[array_rand($name)]; ?> Characters</a></li>
                  <li class='Nav-li'><a href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </header>
