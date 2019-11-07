function Mudarestado (pf, pj){

    if (pf && document.getElementById('pf').style.display === 'block'){
      document.getElementById('pf').style.display = 'none';
      document.getElementById('pj').style.display = 'none';
    }else if (pf && document.getElementById('pf').style.display === 'none'){
      document.getElementById('pf').style.display = 'block';
      document.getElementById('pj').style.display = 'none';   
    }

    if (pj && document.getElementById('pj').style.display === 'block'){
      document.getElementById('pf').style.display = 'none';
      document.getElementById('pj').style.display = 'none';
    }else if (pj && document.getElementById('pj').style.display === 'none'){
      document.getElementById('pf').style.display = 'none';
      document.getElementById('pj').style.display = 'block';
    }

  
  }