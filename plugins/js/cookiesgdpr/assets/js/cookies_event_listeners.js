document.addEventListener('gdprCookiesEnabled', function (e) {

  if(e.detail.marketing) {

    // console.log('Marketing');

  }

  if(e.detail.performance) {

    // console.log('Perfonrmance');
  }

  if(e.detail.analytics) {

    // console.log('Analitycs');
  }

});
