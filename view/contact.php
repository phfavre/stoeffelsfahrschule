
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbwgSVSXNi67Eg7XGOYcpFxUDPFz3XmIg&callback=initialize" async defer></script>
<script>
  function initialize()
  {
    var mapCanvas = document.getElementById('map_canvas');
    var mapOptions = 
    {
      center: new google.maps.LatLng(46.424838, 7.321966),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false,
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(46.424838, 7.321966),
      map: map,
      title: "Panorama B&B, Lauenen"
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<section id="contact_section">
  <div class="container">
    <div class="col-md-14">
      <div id="contact_section_div">
        <div class="section_title capLetters" id="contact_title_div">
          Kontaktieren Sie Uns
        </div>
        <div class="section_content">
          <div class="row">
            <div class="col-md-4">
              <div class="contact_description_item italicLetters" id="contact_description_item_email">
                <a href="mailto:info@stoeffels-fahrschule.ch">info@stoeffels-fahrschule.ch</a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact_description_item italicLetters" id="contact_description_item_phone">
                Lauenenstrasse 5, 3782 Lauenen b. Gstaad
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact_description_item italicLetters" id="contact_description_item_address">
                Tel: +41 79 311 18 62
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="map_canvas"></div>
</section>

