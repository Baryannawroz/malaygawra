$(document).ready(function () {
  // Get CSRF token from the meta tag
  const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  $(".auto-search-customers").select2({
    allowClear: true,
    maximumSelectionLength: 1,
    placeholder: "کڕیارێک هەڵبژێرە",
    ajax: {
      url: "/api/search/Students",
      type: "POST",
      dataType: "json",
      data: function (params) {
        return {
          _token: CSRF_TOKEN,
          search: params.term,
        };
      },
      processResults: function (response) {
        return {
          results: response,
        };
      },
      cache: true,
    },
  });
});
