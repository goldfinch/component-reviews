<% if Items.Count %>
<div class="container">
  <div class="row justify-content-center my-5">
    <div class="col-md-8">
      <div class="accordion" id="reviewblock-{$Top.ID}">
        <% loop Items %>
          <% if not Disabled %>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#reviewblock-{$Top.ID}-item-{$ID}"
                  aria-expanded="false"
                  aria-controls="reviewblock-{$Top.ID}-item-{$ID}"
                >
                  $Author
                </button>
              </h2>
              <div
                id="reviewblock-{$Top.ID}-item-{$ID}"
                class="accordion-collapse collapse"
                data-bs-parent="#reviewblock-{$Top.ID}"
              >
                <div class="accordion-body">$Text</div>
              </div>
            </div>
          <% end_if %>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>
<% end_if %>
