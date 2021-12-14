<div class="getintouch"> 
    <% loop $Contact %>
    <img src="$BackgroundImage.Link" loading="lazy"  alt="serum" class="contactPic">
        <div class="contactContent">
            <h1 class="contactHead">$Title</h1>
                <p class=contactText>$Content</p>
                    <button class="contactBtn">Contact us</button>
        </div>
    <% end_loop %>
</div>

<footer>
	<div class="footerContent">
		<img src="$resourceURL('themes/vaca/images/VACA-logo.svg')" class="footerlogo" loading="lazy" height="70px" width="120px" alt="logotype">	
        
        <ul class="footerlist">
                <% loop $FooterPages %>
                    <li><a href="$Link">$MenuTitle</a></li>
                        <% end_loop %>
		</ul>
	
	</div>	
</footer>
