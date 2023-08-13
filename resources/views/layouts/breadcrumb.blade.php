 @php
 $city = DB::table('categories')->get();
 @endphp
@foreach ($city as $url)

 <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Lawyers",
        "item": "https://topatlaw.com/lawyers"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "Category",
        "item": "https://topatlaw.com/lawyers/{{$url->url}}"
      }]
    }
    </script>
    
@endforeach    