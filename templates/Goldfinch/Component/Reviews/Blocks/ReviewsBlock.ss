<% if Items.Count %>
  <% if Items %>

    <ul>
      <% loop Items %>
        <% if not Disabled %>
          <li data-id="{$URLSegment}">
            <div><a href="#{$URLSegment}">$Publisher</a></div>
            <div>$Text</div>
          </li>
        <% end_if %>
      <% end_loop %>
    </ul>
    <% include Goldfinch/Nest/Partials/Pagination %>
  <% else %>
    <p>Sorry, there are no reviews that match your request</p>
  <% end_if %>

<% end_if %>
