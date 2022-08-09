

// home page
$(".assign").click(function() {
    let assetId = $(this).closest('div.assetBox').attr('id');
    console.log(assetId)
    // var searchParams = new URLSearchParams(window.location.search);
    window.location.replace('./assignAsset.php?assetId=' + assetId);
  });

  $(".release").click(function() {
    let assetId = $(this).closest('div.assetBox').attr('id');
    // var searchParams = new URLSearchParams(window.location.search);
    window.location.replace('./releaseAsset.php?assetId=' + assetId);
  });

  $(".retire").click(function() {
    let assetId = $(this).closest('div.assetBox').attr('id');
    // var searchParams = new URLSearchParams(window.location.search);
    window.location.replace('./retireAsset.php?assetId=' + assetId);
  });
  // const logout = document.querySelector('#logout');
  // logout.addEventListener('click', function() {
  //   window.location.replace('./logout.php');
  // });

  $('#logout').click(function(){
    window.location.replace('./logout.php');
  })

  $('.createUser').click(function(){
    window.location.replace('register.php');
  })