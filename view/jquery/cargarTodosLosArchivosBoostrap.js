// https://stackoverflow.com/questions/44230721/how-can-you-import-multiple-stylesheets-and-bootstrap-libraries-into-an-html-doc
let stylesheets = [
    'http://link-to-stylesheet-.com/css?family=somethingsomethingsomething',
    'http://link-to-stylesheet-.com/css?another-stylesheet',
    'http://link-to-stylesheet-.com/css?family=someding',
    'http://link-to-stylesheet-.com/css?someotherstylesheet',
    'http://link-to-stylesheet-.com/css?stylesheetnumber100'
  ];
  
  function createStylesheet( href ) {
    let link = document.createElement('link');
    link.type = 'text/css';
    link.rel = 'stylesheet'
    link.href = href;
    return link;
  }
  
  // an array of stylesheet links 
  const appendStylesheets = stylesheets.map(function (sheet) {
    const createdLink = createStylesheet(sheet);
    return createdLink;
  });
  
  appendStylesheets.forEach(function (link) {
    document.getElementsByTagName('head')[0].appendChild(link);
  });