<div class="container">
    <% if $Title && $ShowTitle%>
        <h2 class="element-title">$Title</h2>
    <% end_if %>
    <% if $Content %>
        <div class="my-4">
        $Content
        </div>
    <% end_if %>

    <% if $CTAType != 'None' %>
        <div class="cta">
            <a href="$CTALink" class="cta-link btn btn-outline-primary"
                <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                <% else_if $CTAType == 'Download' %>download
                <% end_if %>>
                $LinkText
            </a>
        </div>
    <% end_if %>

    <div class="stats-container mt-4 d-md-flex justify-content-md-center">
        <% loop $Stats %>
            <div class="stat text-md-center <% if last %>mb-0<% else %>mb-5<% end_if %> mb-md-0 ms-4 me-4">
                <p class="stat-value my-0 d-flex<% if $UnitsFirst %> flex-row-reverse<% end_if %> justify-content-center align-items-baseline">
                    <span class="countup">$Value</span><span class="units">$Units</span>
                </p>
                <p class="stat-title my-0 text-uppercase text-lt-orange">$Title</p>
            </div>
        <% end_loop %>
    </div>
</div>

