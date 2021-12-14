<main>
    <section class="viewproduct">
        <h1 class="view">$ProductPage</h1>
            <div class="productBtns">
                <button class="btn"><a href="{$Link}?sort=Price" >Price</a></button>
                <button class="btn"><a href="{$Link}?sort=Created&dir=DESC">Newest</a></button>
                <button class="btn"> <a href="{$Link}?sort=Created&dir=ASC">Oldest</a></button>
            </div>
    </section>

    <section class="products">
        <div class="flex-container">
            <% loop $PaginatedList %>
            <div class="flex-item">
                <div class="container">
                    <div class="picContainer">
                        <img src="$Image.Link" style="filter: brightness(70%);" loading="lazy" alt="cream" class="pic" />
                    </div>
                    <h2 class="pictext">$PicText</h2>
                </div>
                    <h2 class="productTitle">$Title</h2>
                        <h4 class="productText">$Content</h4>
                        <h4 class="productPrice">€$Price<h4>
            </div>
        <% end_loop %>
        </div>

          <% if $PaginatedList.MoreThanOnePage %>
            <div class="pagination">
            <% if $PaginatedList.NotFirstPage %>
                <a class="prev" href="$PaginatedList.PrevLink">❮</a>
            <% end_if %>
            <% loop $PaginatedList.PaginationSummary %>
                <% if $CurrentBool %>
                <a class="active" href="#">$PageNum</a>
                <% else %>
                    <% if $Link %>
                        <a href="$Link">$PageNum</a>
                    <% else %>
                        ...
                    <% end_if %>
                <% end_if %>
            <% end_loop %>
            <% if $PaginatedList.NotLastPage %>
                <a class="next" href="$PaginatedList.NextLink">❯</a>
            <% end_if %>
        </div>
        <% end_if %>

    </section>
</main>