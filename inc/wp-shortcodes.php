<?php
function mostrar_mapa_shortcode() {
    $locations = array(
        array(
            'label' => 'Gelatería Dolcefina Salamanca',
            'lat' => 40.4223691,
            'lng' => -3.6831007,
            'direccion' => 'Paracas 431, Lima 15022'
        ),
        array(
            'label' => 'Gelateria Dolcefina Chamberi',
            'lat' => 40.4368949,
            'lng' => -3.6998677,
            'direccion' => 'Calle de Goya, 12, 28001 Madrid, España'
        ),
        array(
            'label' => 'Gelateria Dolcefina Centro',
            'lat' => 40.4267639,
            'lng' => -3.7036229,
            'direccion' => 'C. del Camino del Cura, 10, 28109 Alcobendas, Madrid'

        ),
        array(
            'label' => 'Gelateria Dolcefina Cascorro',
            'lat' => 40.4109748,
            'lng' => -3.7074469,
            'direccion' => 'Pl. de Cascorro, 20, Centro, 28005 Madrid, España'
        ),
        array(
            'label' => 'Gelatería La Dolce Fina Alcobendas',
            'lat' => 40.5085624,
            'lng' => -3.6451435,
            'direccion' => 'Calle de Goya, 12, 28001 Madrid, España'
        ),
        array(
            'label' => 'Gelatería La Dolce Fina Majadahonda',
            'lat' => 40.44249,
            'lng' => -3.8456293,
            'direccion' => 'Av. de Monteclaro, 28223 Madrid, España'
        )
    );

    ob_start(); 
    ?>
    <div id="map-locations" data-locations="<?php echo htmlspecialchars(json_encode($locations)); ?>"></div>
    <script type="module" src="<?= DL_THEME_URL ?>/dist/assets/js/map-shortcode.min.js?test=<?= filemtime( DL_THEME_PATH . '/dist/assets/js/map-shortcode.min.js' ) ?>"></script>

    <div id="map" style="width: 100%; height: 500px;"></div>
    <script>
        (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({key: "AIzaSyBaWEw0520633trSiLSlAj59WlWss9UGoo", v: "weekly"});
    </script>
    <?php
    return ob_get_clean(); 
}
add_shortcode('mostrar_mapa', 'mostrar_mapa_shortcode');