<% if $Video %>
    <video src="$Video.URL" <% if $Thumbnail %>poster="$Thumbnail.URL"<% end_if %> controls <% loop $Arguments %> {$Key}="{$Value}"<% end_loop %>></video>
<% end_if %>
