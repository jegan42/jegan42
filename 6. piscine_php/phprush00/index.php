<?PHP
session_start();
//include("install.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Kpop-Shop</title>
  <link rel="stylesheet" type="text/css" href="srcs/css/kpopshop.css">
  <meta name="google" content="notranslate"/>
</head>

<body>
  <div id="head">
    <a href="index.php"><img src="img/kpop-logo.png" height=200px/></a>
    <a href="index.php"><h1>Kpop-Shop</h1></a>
  </div>


  <div id="menu">
    <ul>
      <li><a href="srcs/qui-sommes-nous.php">Qui sommes nous ?</a></li>
      <li><a href="srcs/boutique.php">Boutique</a></li>
	  <li><a href="srcs/contact.php">Contact</a></li>

<?php
	if ($_SESSION['logged_on_user'] != "")
	{
		echo"<li><a href='srcs/connexion/mon_compte.php'>Mon Compte</a></li>";
		echo"<li><a href='srcs/connexion/deconnexion.php'>Deconnexion</a></li>";
	}
	else
	{
		echo"<li><a href='srcs/inscription.php'>Inscription</a></li>";
		echo"<li><a href='srcs/connexion/connexion.php'>Connexion</a></li>";
	}
?>

	  <li><a href="srcs/panier.php">Panier <?php
        if (!$_SESSION['nb_articles'])
			$_SESSION['nb_articles'] = 0;
		if ($_SESSION['nb_articles'] == 0)
			echo "(".($_SESSION['nb_articles']).")";
		else
			echo "(".($_SESSION['nb_articles'] - 1).")";?></a></li>


<?php
			if ($_SESSION['logged_on_user'] == "admin")
			{
      			echo"<li><a href='srcs/admin/admin.php'>Admin</a></li>";
			}
?>
    </ul>
  </div>

  <div id="content">

    <br/>
		<a href="srcs/boutique.php"><h3>Cliquez ici pour visiter notre Boutique de supers kpops</h3></a>

    <p>K-pop (coréen : 가요, kayo1; abréviation de Korean pop1, français : Pop coréenne, coréen : 케이팝) est un terme désignant plusieurs genres musicaux (dance-pop, pop ballad, électronique2.) originaires de Corée du Sud, caractérisés par une large variété d'éléments audiovisuels et abrégés au terme de K-pop.

Ce courant musical inventé après la guerre pour aider la crise financière que traversait la Corée du Sud, a en 1992, vu sa popularisation être lancée grâce au groupe Seo Taiji & Boys, dont la fusion entre plusieurs styles musicaux (et principalement du hip-hop) a remporté un franc succès, qui a révolutionné l'industrie musicale en Corée du Sud3. De ce fait, l'ajout d'éléments en provenance de musiques étrangères devient une pratique banale dans l'industrie de la K-pop4.

À partir des services de réseaux sociaux et de la plateforme de partage vidéo YouTube, la K-pop étend son audience et prolifère grâce à ces services de partage sur Internet5. Au milieu des années 2000, le marché de la musique K-pop double ses ventes. À la première moitié de 2012, elle rapporte un total de 3,4 milliards de dollars6, et est reconnue par le magazine Time comme l'« exportation la plus rentable de Corée du Sud7. »

Initialement devenue populaire dans l'est de l'Asie durant la fin des années 1990, la K-pop s'ouvre au marché japonais au tournant du xxie siècle grâce à la SM Entertainment et de la star BoA. Fin des années 2000, elle passe d'un genre musical à une sous-culture chez les adolescents et jeunes adultes en Asie de l'est et du sud8. Depuis, la K-pop est présente dans d'autres régions du monde, comme l'Amérique latine9,10,11, dans le Nord-Est indien12,13, en Afrique du Nord14,15, au Moyen-Orient16,17, en Europe de l'Est18,19 et dans la population immigrée en Occident2</p>

		<a href="srcs/boutique.php"><img src="img/kpop-lead.jpg" height=200px title="Achetez-moi"/></a>

      <p>La K-pop regroupe principalement des Boys band et Girl group, qui peuvent être séparés par différents critères comme le style d'un groupe ou la génération à laquelle un groupe appartient, en fonction du nombre de membres, etc.

Les principaux groupes formant la première génération sont H.O.T., Shinhwa, SES, Fin.K.L, etc.

La seconde génération peut être citée comme celle ayant propulsée la K-pop dans le monde entier avec le début d'internet, on peut nommer Super Junior, BigBang, Girls' Generation, Kara, 2PM, T-ara, etc. Cette génération est aussi apparentée à la période où la musique digitale était beaucoup plus populaire que les albums ou CD physiques.

Et enfin la troisième génération, celle qui comprend les groupes les plus populaires du moment, peut être caractérisée tout d'abord par le nombre de groupes. En effet, le nombre de groupes de K-pop n'a fait que croître pour atteindre un pic à l'heure actuelle. L'autre caractéristique de cette génération va être l'utilisation active des réseaux sociaux tels que Instagram, YouTube ou encore Twitter; on peut citer BTS, GOT7, Red Velvet, NCT, BLACKPINK, Twice, etc.

Une des principales différences de ces trois générations va être le type de support musical. En effet, la première va voir ses ventes de CD et d'albums très élevées, la seconde les ventes physiques seront faibles mais aura des ventes digitales (en téléchargement) au contraire élevées. Enfin la troisième génération voit ses ventes physiques et digitales augmenter sans préférences pour un type de support particulier.

Bien que ces limitations de générations ne sont pas officielles, c'est ce que les médias coréens utilisent pour qualifier un groupe, ainsi selon les différentes sources que l'on peut trouver, certains diront qu'il y a aujourd'hui cinq générations par exemple29.</p>

		<a href="srcs/boutique.php"><img src="img/kpop-love.jpeg" title="Achetez-moi"/></a>

        <p>Chaque groupe peut parfois posséder un concept en particulier dès le début du groupe, mais parfois ce concept peut changer au cours du temps (soit par préférence des membres soit par intérêt commercial). Par exemple le groupe Girl's Day qui a débuté avec un concept pouvant être qualifié de mignon, a opté le concept plus sexy quelques années après leurs débuts. Ou encore VIXX qui possède maintenant un concept très sombre.

Parfois le concept d'un groupe peut justement être le changement de concept à chaque nouvel album. On peut citer les Girls' Generation, qui n'ont fait que changer de concept à chaque comeback, passant du mignon au sexy, ainsi qu'au sombre et au rétro.</p>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
        </div>

      </body>

      </html>
