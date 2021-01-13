function changeProduct(){
    document.querySelector('my-product').name = '"Bekerja dengan susana hati yang lebih asik dan mempelajari hal baru setiap harinya"';

    document.querySelector('my-product').show();
}

function changeProductBack(){
    document.querySelector('my-product').setAttribute('name', '"Gunakan Waktu Luang Untuk Membaca"');
    document.querySelector('my-product').hide();

}


const template = document.createElement('template');
template.innerHTML = `<style>h2{color:black;text-align: center;
    font-weight: 200;
    font-style: italic;
    font-size: 24px;}</style>
<h2></h2>
`;

class MyProduct extends HTMLElement{
    static get observedAttributes(){
        return ['name']
    }

  constructor(){
    super();
    this.attachShadow({mode:'open'})
    this.shadowRoot.appendChild(template.content.cloneNode(true));
    this.shadowRoot.querySelector(
    'h2').innerText = this.getAttribute('name');
  }

  hide(){
    this.shadowRoot.querySelector(
        'button').style.display = "none";
  }

  show(){
    this.shadowRoot.querySelector(
        'button').style.display = 'block';
  }

  get name(){
    return this.shadowRoot.querySelector(
        'h2').innerText
  }

  set name(val){
    return this.shadowRoot.querySelector(
        'h2').innerText = val;
  }

  attributeChangedCallback(name, oldValue, newValue){
      if(name === 'name'){
          this.shadowRoot.querySelector('h2').innerText = newValue;
      }
  }

  connectedCallBack(){
    this.shadowRoot.querySelector('button').addEventListener('click', () => this.dispatchEvent(new Event('buy', {})));
  }

  disconnectedCallBack(){
    this.shadowRoot.querySelector('button').removeEventListener('click');
}

}


window.customElements.define('my-product', MyProduct);