@php
  $reviews = DB::table('lawyerreviews')->limit(3)->get();
@endphp


@foreach ($reviews as $review)
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Review",
  "itemReviewed": {
    "@type": "LegalService",
    "name": "Topatlaw",
    "address": {
      "@type": "PostalAddress",
    }
  },
  "reviewRating": {
    "@type": "Rating",
    "ratingValue": "{{ $review->rattings}}"
  },
  "name": "{{ $review->review }}",
  "author": {
    "@type": "Person",
    "name": "{{ $review->name }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Topatlaw"
  }
}
</script>
@endforeach