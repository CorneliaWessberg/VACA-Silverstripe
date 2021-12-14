<!DOCTYPE html>

<html lang="$ContentLocale">
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	$MetaTags(true)
    <link rel="stylesheet" href="$mix('css/app.css', 'vaca')">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Unica+One&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="headerpart">
			<div class="headlogo">
				<img src="$resourceURL('themes/vaca/images/VACA-logo.svg')" class="headerlogo" loading="lazy" height="70px" width="150px" alt="logotype">
			</div>	
		</div>
		
		<div class="headerSection">
		 <img src="$HeroSectionBGImage.Link" loading="lazy" alt="serum" class="headerPic">
			 <div class=headerContent>
				<h1 class="headtext1">$HeroLead</h1><br>
					<h3 class="headtext2">$HeroText</h3>
			</div>			
		</div>
	</header>