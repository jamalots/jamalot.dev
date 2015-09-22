@extends('layouts.master')

@section('content')

<style>
*:after, *:before, * {
  box-sizing: border-box;
  font-family: arial;
}

body {
  background: #1D1F20;
}

.media-row {
  display: table-row;
}

.thumbnail {
  display: table-cell;
  background: #fff;
  border: 1px solid #333;
  overflow: hidden;
  position: relative;
  height: 150px;
  width: 25%;
}
.thumbnail img {
  width: 100%;
  position: relative;
  -webkit-transition: 0.5s;
  transition: 0.5s;
}
.thumbnail .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  background: rgba(0, 0, 0, 0.7);
  -webkit-transition: 0.3s;
  transition: 0.3s;
  z-index: 4;
  left: 0;
  top: 100%;
  text-align: center;
  color: #fff;
}
.thumbnail .overlay .zoom-btn {
  opacity: 0;
  top: 150px;
  -moz-transition: 0.4s 0.2s;
  -o-transition: 0.4s 0.2s;
  -webkit-transition: 0.4s;
  -webkit-transition-delay: 0.2s;
  -webkit-transition: 0.4s 0.2s;
          transition: 0.4s 0.2s;
}
.thumbnail .overlay h2 {
  position: relative;
  margin: 0 auto 15px;
  -moz-transition: 0.3s 0.25s;
  -o-transition: 0.3s 0.25s;
  -webkit-transition: 0.3s;
  -webkit-transition-delay: 0.25s;
  -webkit-transition: 0.3s 0.25s;
          transition: 0.3s 0.25s;
}
.thumbnail.open {
  border-color: #222;
  pointer-events: none;
}
.thumbnail.open:after {
  content: '';
  position: absolute;
  left: 50%;
  -ms-transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
  z-index: 5;
  bottom: 0;
  border: 15px solid transparent;
  border-bottom-color: #222;
}
.thumbnail:hover img, .thumbnail.open img {
  -ms-transform: rotate(-45deg) scale(2);
  -webkit-transform: rotate(-45deg) scale(2);
  transform: rotate(-45deg) scale(2);
}
.thumbnail:hover .overlay, .thumbnail.open .overlay {
  top: 0;
}
.thumbnail:hover .overlay h2, .thumbnail.open .overlay h2 {
  margin-top: 20%;
}
.thumbnail:hover .overlay .zoom-btn, .thumbnail.open .overlay .zoom-btn {
  top: 0;
  opacity: 1;
}

.zoom-btn {
  position: relative;
  width: 15px;
  height: 15px;
  display: inline-block;
  border: 2px solid;
  color: #f00;
  border-radius: 100%;
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  cursor: pointer;
}
.zoom-btn:before {
  content: '+';
  position: absolute;
  left: 2px;
  top: -4px;
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
.zoom-btn:after {
  content: '';
  position: absolute;
  width: 2px;
  height: 10px;
  background: #f00;
  top: 100%;
  left: 0;
  right: 0;
  margin: auto;
}

.media-view {
  position: relative;
  background: #222;
  padding: 10px;
  overflow: hidden;
  *zoom: 1;
  width: 100%;
  display: none;
}
.media-view .media-thump {
  width: 70%;
  float: left;
}
.media-view .media-thump img {
  width: 100%;
  max-width: 640px;
  margin: auto;
  display: block;
}
.media-view .media-info {
  float: left;
  width: 30%;
  padding: 10px;
  color: #fff;
}
.media-view .media-info h2 {
  margin: 15px auto;
}
.media-view .media-info p {
  color: #bbb;
}
.media-view .close {
  position: absolute;
  right: 10px;
  top: 5px;
  font-weight: 200;
  color: #fff;
  font-size: 24px;
  opacity: .6;
  cursor: pointer;
  z-index: 4;
}

</style>

<div class="media">
  <div class="media-row">
    <div class="thumbnail"><img src="http://img3.wikia.nocookie.net/__cb20120618235731/penguinsofmadagascar/images/thumb/6/6b/MadagascarAlex.jpg/1000px-MadagascarAlex.jpg&quot;"/>
      <div class="overlay">
        <h2>Alex</h2>
        <p>The Lion</p><span class="zoom-btn"></span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://3boysandadog.com/wp-content/uploads/2012/12/King-Julien-and-Maurice.jpg"/>
      <div class="overlay">
        <h2>Julien</h2>
        <p>King of Lemurs</p><span class="zoom-btn"></span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://img2.wikia.nocookie.net/__cb20140409215638/penguinsofmadagascar/images/thumb/f/f0/Marty-madagascar-23836394-400-300.jpg/1000px-Marty-madagascar-23836394-400-300.jpg"/>
      <div class="overlay">
        <h2>Marty</h2>
        <p>Zebra </p><span class="zoom-btn">       </span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://vignette1.wikia.nocookie.net/dreamworks/images/e/e9/ShifuGreen.jpg/revision/latest?cb=20141231191851"/>
      <div class="overlay">
        <h2>Shifu </h2>
        <p>Master</p><span class="zoom-btn"></span>
      </div>
    </div>
  </div>
  <div class="media-row"> 
    <div class="thumbnail"><img src="http://rocketdock.com/images/screenshots/2_03_09_2006_madagascar-dreamworks-penguin5g.jpg"/>
      <div class="overlay">
        <h2>Penguins</h2>
        <p>Carzy forces</p><span class="zoom-btn"></span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://img4.wikia.nocookie.net/__cb20120429161157/penguinsofmadagascar/images/thumb/b/b7/Madagascar-dreamworks-gloria4g.jpg/1000px-Madagascar-dreamworks-gloria4g.jpg"/>
      <div class="overlay">
        <h2>Gloria</h2>
        <p>Hippopotamus </p><span class="zoom-btn"></span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://spoileralertv.files.wordpress.com/2011/11/melman.jpg"/>
      <div class="overlay">
        <h2>Melman</h2>
        <p>The Giraffe </p><span class="zoom-btn"> </span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://newartcolorz.com/images/2014/5/kung-fu-panda-15286-15758-hd-wallpapers.jpg"/>
      <div class="overlay">
        <h2>Po</h2>
        <p>Panda</p><span class="zoom-btn"></span>
      </div>
    </div>
  </div>
  <div class="media-row"> 
    <div class="thumbnail"><img src="http://vignette2.wikia.nocookie.net/dreamworks/images/3/39/MrPingMain.jpg/revision/latest?cb=20110902234820"/>
      <div class="overlay">
        <h2>Ping</h2>
        <p>noodles </p><span class="zoom-btn"></span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://vignette3.wikia.nocookie.net/kungfupanda/images/e/e4/Kung_fu_panda-master-crane.png/revision/latest?cb=20110203011040"/>
      <div class="overlay">
        <h2>Crane</h2>
        <p>Master </p><span class="zoom-btn"></span>
      </div>
    </div>
    <div class="thumbnail"><img src="http://vignette2.wikia.nocookie.net/kungfupanda/images/b/b1/Commander_vachir.jpg/revision/latest?cb=20120521185624"/>
      <div class="overlay">
        <h2>Raino</h2>
        <p>Black Army </p><span class="zoom-btn"> </span>
      </div>
    </div>
    <div class="thumbnail"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIQEhQUEhQUFhIXFRcWFBcUEhUVFBQZFBUWFhUWFBUYHCggGholHBUWITEhJSkrLi4uFyAzRDUsNygtLisBCgoKDg0OGxAQGzQkHyQ0NDQtLCwsLCw0LywuLCwsMDcuNCwsNCwvLC8sLCwsLCwsLCwsLCwtLCwsLCwsLCwtLP/AABEIALcBFAMBIgACEQEDEQH/xAAcAAEAAgIDAQAAAAAAAAAAAAAABgcEBQIDCAH/xABCEAACAQIEBAQDBAgEBAcAAAABAgADEQQSITEFBkFREyJhcQeBkTJCobEUI1JicoKSwRUzQ9Gi4fDxCBYXNGOywv/EABkBAQADAQEAAAAAAAAAAAAAAAABAgMEBf/EAC0RAAICAQMCBQMDBQAAAAAAAAABAgMRBCExEkETIlGB8BRhoVJxsRVCYpHR/9oADAMBAAIRAxEAPwC8YiIAmj4/zRQwZCtdqhFwiWzWPVidAJvJVnONFqVXEio9Mmrkq07BQ9vEdSrEnMTlyDt5TbrbG+UowbibUQjOaUiccu8y0cbmCXWourI1r2/aBG4m7lMci1mp8QonyhWD03u1j5kJXTrdlWXNI09jnDL5J1NSrnhcH2JHa3OuCV8hqG4YqTlNgQbG595k4vmfC01zeKrC17Icx/5SXfWuZIqqbH/azcxKzxfxRzM6UKYDKNMwZr2Nj2tMHF8848i9JqWbQkGnoe4H/XSUlqq4vDNI6SySykW1EqXB/ErGCqUqU6TIBckBlOgBOtyLa9pI63xCRaZPgtnHTMuT3Lb2+Un6qtcsj6WzsibxKz5V+Jb43GphstMhi1ymby2UncnXbtLMm0JqSyjGUXF4YiIlioiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAJRXOdWomLxAqE5vFYi/VCb07emTL9Jesi3PHLtDGKniCzgkK66NsfKT1W/SYairrj+x0aa3w5fuUxhOIVPFVV16nTa22sujlLmVK9NadRrVwLDMR+syjdT1PeV9X4UmGzJkC27EnN21OpEx8H+prU6jDM7VaYUfsjOPsjuBvPLp1HTZhL7YPSvoU4Zz98mHzDy4zcSxAoVitIOGOl8rOA9RBfexJ+tuhm041wqutGy02RXFkYiwJ3tfpcd58GLVK2IqVDp+kvfrceKwtpv5fykr595nWklKn4T+HVdf13l8IBddCCTf0IGkvKErZTl+nherM4TVSjH9XJWfDiTUYVVy11GtxYsu1z3958HGaZqFb+TYN0v1+Xr6SU8S4etYqdms6ZhvlemwI9dbH5SEU+Vq4r+EbAWLZxquUGxI9dRpMKLabcubw8cf8OmzxK8KKzubCtRq1KhpURobNVY7C+wJ7WG3WSNuUa9bCmqpUgAqFJN6ip5W9BsZkYHCLSDdrjU9lRVF/ks6OC84V1pVQ3h/oud/CJU+K1yfKliLi+tyNL29raWSvn042S/Jnqs1R6u7/ghnBuI/wCFVxVoIlzemxcEmmrkBmXXRh630vPQHKuIqvQ/XMGcEgkdRuJ5lxmJ8YVCRY53uP4ixH5z0B8K8Ya2CR23KUyffLr+U9alvhnlWpPdEziIm5iIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCYXFsMalOy/aBzL6kdJmxAIFxnBiuudftpoR1Pce4MitYhT4m5U2X0N95avEOFhznTyv/AMLfxDvpvK65t4awuQCrC5dSN7/eTv8AKeXq9I3LxIe56Wl1SUeiXsR7j5y1sUAfMtQVV63zgP8AhnWb/B8Ww2Iw1YtlNNxn8B7FUcDz0V6qcwLoeoew+yRNHzTtRxtLVCgpV9LhCnlBcDXKwupPSyzEw3FKbIFUZbrl0AZQCO/Ueh3iU5V8LZ75CrjZy8NGZhqlTwSKZqrTH2HenarSAOgqKwsy+o1sdus2D421RRYHy6n1NjoP7es78Ny6+HwjYks2YALTXMQmWpZWL07lOtwQFkZqY5wbnKT3Kicd9EJNNLnf05OumySTTfGx28TxThRSUVKgYte7Wapqbgn7qXBFha9vrhYSgtVD+k3DKLuqmy0aan7NlO7WyqOpfbymdn6QrvTqPTzuMyBCzLRXUsXcIQW3AAvbeZXEMTT8CzpTRbZjTQKqKx62Xc+pufWdcZRqiku/p6nLKErZPPYgWLrAvVfYMxIHbdv7iX/8G8I1Ph6Fha509lAB/HNKH4Pw9sXiKdFBfM4B+Z3PufwBnqnhmCWhSSkgsqKFHyGp+Z1no1rucFj7GVONSoFBJNgASSdgBqTOU03OCscHXy7hLm3UKQWH9IMtN4i2VguqSRrTzzQDG6PkF7NYa/y72kRxnMteqxqeKy9lViFXsLDf5zS8wMcKqZ9qiBkKhmDBhcWIHrNJw3CVKoKZyCQSNcoPcEg6Ty1HUXrzPH4PUctNQ/Ks/knvDvijZgtZVKrlFRl31uMw9dNpZ1KoGAZSCpAII2IIuCJ5sbl5gTvlPRSLfUb63noDlOmFwWGVb2FFBrvcKAQfncT0aoyjs3k862UZPKWDbRETUyEREAREQBERAEREAREQBERAEREAREQBERAExOJcNp4hMlRbjoeqnuDMuIBWPFOXsRw0vVpkVsM3+YhAGUHqy2tbuRIJjzghUY00fD1Q33WNTDm4BBIzLa99lPynod1uCCAQRYg63B6ESifiZy9ToYvw0uFamKtMdEGYoyL+6CFP885bY9O/bujprl1bd+zJ/guI0auAUVSDRdMlRhcAHbfTLrqCeunWVzxnhVaixCGlXQC4cVUptlJIGdWO+h2vtNvyw1TB4dg3npPqVOu4sdDoQR0kL5gq8OQlkR0HRBUYLfsE3t6bSXVGfKIjZKD2ZwxLNlA+/mzeXWwF9L9ffSYtag+IF2YqPVUYf8NQ6+8jr+Ji6wAB6ZVGyDYCWLwThn6NlFhUxLC5c/6S9Tm39Be5MyulXV23Nqo2W7J7Gd8PaKYPEUXAsCxDNWUoWBFiVuLA63Fz6aS4cTzNg6d82Ip6b2bNbsDlvYypGo3qFA+bKt69Vv8ANsbkU0I1XTXQzGwFNWyOBlLk+Euwo0x9px++b7+sw/qD6c4+fPnY2+hTfJaWN56wtMEjO1hc+XIB2zFrWPpa/pNFxXnVsRTaklLJnXVmfzZTvZLXAI0ubbyIUWU5qxF6dPN4CbgkGxqHuzEbmMLiFp5g2r3u5O5J/t2mM9bbJNI2q0VcZJs3fM1ehgsFSqVwKjBLJTDXBNzYEg20vKifjb13IYBQ17KlwF7D1m35xxvjDKpGUC9t9R27f9pD8O3mX3E9CnzVLJwXrptZl1OI1UqEqxFmNgDYaGelfhVxFsRw9Gc3Id1+hv8AmTPMwoF6pAF/Mfz0np34W8PNDh1ENu2aof5zofmAD85vBehhNksiImhmIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAlQfGrErQxnDqr38MrWp1Lb5S1LX1sWBlvyqf/ENgM+CpVrX8KrlJ6haq/lmRJWSysFoPDyQ3mvninTJoYYK5AsWOqqeu2hPprIBVwNSoc7ks7HrOXCsLsx3+6O3rbvN1RN8vvl9rsoH4kzKc+jZHZTQpLqn3NnyNgkWgamniM7X7gISth9JvsJiMrOTuzW+SgWH9/nI7y3j8uHqoAM9Oq59cr6j5XvOX+K1t834Cctmjdkm2+S0dWq0opcG9StY1Qf9Q3v6FQLfLWfKNe2U6+VSh16aa/gJEeLcyVUsqsC59BoO5tLg5P5Pw+NwOHxJeqtWpSBqEMpQtqrXVhtcHrK/QP1LLXfYhdLFDw8nYW7bTX8UXxRdcwe2hH5H0lj4v4av/p1KZ7llZPwF50/+neKK2FSgv9bafQS0NE4yy2RPWprCRT9PCWvnOYkWPYe040+H0gblbn3lxYX4SKTetiSfSnTC+/mYn8pJuD/D/AYYhhS8RxqGqnPYjqF+z+E71FJHnttvJXHIXJTYx1qvT8PCggk2IatbZVvrl7t9PS7kUAAAWAFgBsANhPoE+yUsECcKtQKCWIAG5JsBIvz9zknDKWwau4Phqdh0zN/t1kIw/M5x+Bq53zVd2BOhAa5CrsBYWtDeCUslrvxKioDNVQK32SXAB9r7zJRwwuCCO4NxPNXPPGGxGNp+Ec1M00SkFPl13Atp2+gln8u24YlPxK7vUcAtRUFlN+ygXB130+cjq9SeksiJ0YPErVRXW9iL6ixHcEHYzvlioiIgCIiAIiIAiIgCIiAIiIAiIgCIiAJEvilwWpjeG16VIEvYOqra7mmcwUX9QPpJbEA8h0hlsrAqRoQRYi3cGZ64oBD7jfTY36723/3ky+MfKX6NiDiqCfqavnrAbJUZsrMB+yxK37M/70rwa7ek5bIZe56MJ9SR8xjsjeJSbKxFiOjDpcTDfiGIfS4X1sAZmmjmAt/39vSckwF5op4RWWn8SXUkaujQ1OtzYkk+kvv4BcbD4WphGPnouXQd6dQ3NvZ839QlS0OHIEO+ZyyJ/Khc/wD4HzM7uWOL1OHYilXUXysQQDYOptmDeljIjYmyllDUcHqmJicL4hTxNJK1I3R1DKffofUbTLm5xiIiAIiIBAPityLU4miVMOyivTBADaLUU65b9DfrI/8ADf4UNRPjcQ1b7mHVvJp96qV+16Lt3vsLfiAYlfhlGpT8NqSGn+yUGUew6fKV1zdxc8GORFz1a7FqbvrZBYFSeuUkfUS0JEviTy2Mfh0FwrU6qOG7KSFqD+k391ErJZJTNF8OebqtfENRrFT4il0IGWzpbMtvUa/ymWVKrwnDeH4OrSeniQa1NlNs66/dbT1UkfOWpEXsGhERLECIiAIiIAiIgCIiAIiIAiIgCIiAIiIBh8U4ZSxNM06yB0YEEG4uCLEXBBGhnm3nflipwrFNS1NJwWw79WS+qt+8ugPuD1np6RvnXk+hxOkVqDLWCkUaovek297XsQSNR1ErKOTSufSzzXhmtqdvz9pnNXp2ve0w+L8KrYWs9CsuWsmjbkEXuGQ9VO4M+YXCA2zH3vsLXuffX8JzySXJ6lN8sYSNngqivsLhTmBIPkO1xY6+x3sJ1YvDHMV+zYaBrlgO72Hlv6230mVQqggKoPZVAuzE+g3YyUYbgi0VFfiLXA/y6BbPc9Mw1zt0yi495jw+rg0unGEf8mZ3wp41iMKhFWwwOpDNpqba07/dFj6a/S4cDjaddFqUmDIwDKw6g7SlcRSrY1lFRDlIvSwqkAso+/iG2SmOpPt5j5Z3tzacD5qdTMgsalQCyVSoIShhaZP+UMxJfUsb663XWrUZ5Wx5VkMvPcuuJFuR+cqPEaSeZRiMo8RNtbalO4kpnWYCIiAIiIAmp5swzVcFiUS+c0KmW2+bISLfO0201/HscuHw9So5AUC2v7xyj85DeESjzniOS8eMN4hosuhtY+YW6n8J6T4a5ajSJ3NNCfmokRxXG6dajZCDcW0N99JNaS2AHYAfQSsHkmSwcoiJcqIiIAiIgCIiAIiIAiIgCIiAIidOKxK0xdjYXAGlySdgANzDeAd01nGeP4XBi+IrU6d9QGbzN/Co1PyEi3H+PV6oq+DmSmoqrTsfNVqUb589tQLiwUHWzE6aTzviMS1VjUqMXdtWZjdjKRsUnsWcWuS5uYfjUoJXBUM//wAla6qfVaa6ke5HtIXjviXxWqf/AHGQdqVNFA+di34yGJVnLx5YjBlcU4hiMSwetUeqwFru7MQL3tdjtfW07eF4OtiGy0xc9ybKv8R6fn6TA8ed2C4pWpX8Njl6j/b/AGlJRyawscNkWVw6lh+GKLA4jGuLKq7na4A+4m2u5/LYYai2dq1ZkasgtUqMCcPg77UqSDWrWN7BRrrra+UxPl/iqMt6ZbMR+sKm+JcC91NTRaC+t76m1jMnHcwsbJQylk0UoD4OHvuKIP2n1N6h11O2onC65Sl5v9fPn8GnWbLi3GEw9N6eVrubtTLhsRiNDZ8dUGiL0FFdhptdZX3F8Q1Vs1RrtsABZVG1lHQf7TPr1it+pNyxOpJ7k95osRWuZ1119O75MZSzsc+H8QfDVA6MVIN9CQR7EbS2uC/F80fDXEp4ikWLrYPpsezaEduuspeq15seGcIxGM0oBWakMxUsFJDGwy306dSN5s1kpweoeBc3YPGqDRrKT+w3lcfynf5XE3Hjr3H1nnr4ecGFHFk4lSmWmbLU0zFtNO4AvqO8y+fuaa2DxSpg6pyhAXU+dLk6aHb5ESqk84LdKxkvZsYg+8JwPEafeUBwn4nV3dadakhLG2ZGZdenlOb85MKXHGcLlXVgSLsRquhB8ss3grgs7/E6feVT8ZOOPilXC4YZlUl6xHVgLKnyuSfW3aQjmfn7FBmpLlpWNjkOZj7uf7AT7y9xXxFVkU52bIyjW5t9oSHl8cE7JGN8I6dZ+JUqQLCmpL1gb2C09RcdCWyj5z08tVTsR9ZU3LHARhTUqAfraxDOR0AGiD0G/uZJaVKodifrLEE1zjuPrGcdx9ZGKXB6zC+a3znCvwSsovnv7EwQSvMO8+yAu9RD9o/WZWD4pUB3ME4JpEwOH4wvvM+CBERAEREAREQBERAOLsACTsNT8pAMbzA1V71CEVHzUmUXVSAVPid7gsNbCzaWNjJ9VphgVYXBBBB2IOhEqDmbhWPwVdhQwz1sLvTamczKDujrvcd+otOTVxtaXh+6OjT+Hlqfsze4nFqAwPlDtn8pvlqWt4lE/eBtqm+pNiGNqf5u4DkqNUoZWDElqanruWo913OXdexG0mrcSxIBH6FihfQqKLlT/KVI/Caajy1xPGVPLhqtKmSMzurDKOpCscx9LD6TPTRmuVgm7pXDyQM1R6ifDVI9RLpb4dYYa1qdaoe9QkfXIFv853tyhgNjhqX0I/vO45ykkxAM7FrWN+nWWziPh3w972puh7pVbT2zEianF/C6nb9TiKintUVXH1XLAIBXVst6bEA/atoG95suBVmy9plY3kXH4e+RFqpr/lNc/wBDWN/QXmBgsy3VgysN1YEMD6g6iQ0Sjs4liCOtyZqAST1J7AXmxxFMn3My8JgAi5iNd4Bpa1BwLlHA7lGA/KTP4RXNfEHoKSj6vcfkZKeQ+WwypUqavUuyDcU6QIGa3V3Nst9AATa4k8xHD6VK1KiiLUIzM2UZaa3Ni37THW1z0JO2uUtRFPBZVs1FWkrCzAEdiARIpxfkDD1mZ6b1KVRtSQc6k+qt/YiS58O6IKgzNRbUO5UNY6hsoUWU/WxvptE0jJSWUVawVh/5AxVGoHRqVULqN0N+lwbj8ZIMFhsbT8NTQBCBtqialtz7SYWn3KZbBBWOI+HeJxddqjtToozXtcu/roNL/OWFyryjh8EgWmLt1dtXN9/Ye0y9ZyFQjrAJFheHjuPrNthsCo6g+0hS4lh1navEKg2YyQT4C01vFseqi19ZFW4pVO7H6zobEE76wMHZiK2c6TO4bw9mO01yV7bATNo8TqDY29pAJdhMMEHrMiRSnxNzuTMqji2PeSCQxNdQqOe8z0v1gg5REQBERAEREAREQBERAE6quHR/tKp91BnbEA1lbgNBvuW/hJH/ACmBX5WX7jkfxAH8RJFEAhWK5frpsAw/dP8AaVH8SME1LGI7AgVKQGoIOamSDf5Mk9IyF/Ffllsfgj4QviKJ8WkBu9gQ9P5qTYftKsgnJQA9J21WLKF6/wBzNbTxX/XX5zsw+MAdSdgwvfoLyCS6eA1/CNRjotJadJewFOnm/DO07MXWqHDEG/i4t1Q/tDx2AIv+7SBX5TQLWNZzh10z181TX/SRKRb+okL7Fu03FXHBsWgXVaClnPTxKi5aaj2Qs2nde88yS8yXudOdjY84VyaYpqdLopA2szgH8LyO8O4o36U2HbX9XnQ9RY2I9p28R4oKlVEHmObNUI1VAFNgSNAb209DNZwajn4yReyjDsST/Gq2/GKJNahR7YNJxXgOX3Jlh6DObLNl/guJ7A/MSQ8MwVNAMpBPebCeqcOSFtwbEH7g+o/3gcArn7o/qEmkQRkhh5drdh9ROpuDVRuJOItBOSDf4RU7TsTgrnpJpafYGSK0uX26zMo8AtuRN9EEGupcJQTLp4ZV2E7ogHwCfYiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgFW/Ej4W08WxxGF/VVzc1Aq3SoT94qNQx6kb9jKmxXw+4ipy5EPtVA/BrH8J6rnCpSVvtKD7gH84B5/4XwXiVOznwA5QI96huQt7G6qRfU6eskHBeVmprfGV7ByXchrKzuQLEnXqBbroJa9ThVBt6afJbflK0535c4hTWsuHX9Kw9QkhLhatIm/lW+jKBl6g7zCdKfBrCzB947xijwygEpJTcZrVM2llOhIA+9r+XfSO8hUXqmti3BHikLSB/YQm5+Z/+swuGck4vEMr8RzhV2o6lm/jI0Ue1yfST6hgmACpTawAACobADQAADaWhVGLzgSsb2yEqsuxI9jN1wnjTAgMSRMTD8Drv9zKO7afhvN/wzgK0tW8zfhNTM29NwwBHWcoEQQIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCIiAf/9k="/>
      <div class="overlay">
        <h2>Tigerss</h2>
        <p>Master</p><span class="zoom-btn"></span>
      </div>
    </div>
  </div>
</div>

<script>
$('.zoom-btn').click(function(){
  var image = $(this).closest('.thumbnail').find('img').attr('src'); 
  var title = $(this).closest('.overlay').find('h2').text();
  var details = ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis amet eum quod labore deserunt, adipisci.';
  
  var fullView = '<div class="media-view"><div class="media-thump"><img src="'+ image +'"/></div><div class="media-info"> <h2>'+ title +'</h2> <p>'+ details +'</p></div> <span class="close">&times</span></div>';
  

  
   $('.thumbnail').removeClass('open');
  
  if($(this).closest('.media-row').next('.media-view').length != 0) { 
      $('.media-thump img').attr('src' , image);
      $('.media-info h2').text(title);
  }
  else if (! $(this).closest('.thumbnail').hasClass('open')) { 
     $('.media-view').remove();
      $(this).closest('.media-row').after(fullView);
      $('.media-view').slideDown();
      $(this).closest('.thumbnail').addClass('open');
  }
  
});

$(".media").on("click", ".close", function() {
  $(this).closest('.media-view').slideUp();
  $('.thumbnail').removeClass('open');
  
  setTimeout(function(){
    $('.media-view').remove()
  }, 2000);
});
</script>
@stop