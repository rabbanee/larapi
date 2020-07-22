<ol>
@forelse ($data as $item)
    <li>Provinsi: {{ $item['attributes']['Provinsi'] }}</li>
    <li>Kasus Positif: {{ $item['attributes']['Kasus_Posi'] }}</li>
@empty
@endforelse
</ol>