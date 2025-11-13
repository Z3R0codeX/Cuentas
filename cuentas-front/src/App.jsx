import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import ItemComponent from './components/ItemComponent.jsx'
import Button from 'react-bootstrap/Button';

function App() {

  var X =0;

  //React Hooks
  let [contador, setContador] = useState(0);
  let [array, setArray] = useState([]);

  let clickBoton=() =>{

    setContador(++contador);
    console.log(contador);

    let x={...array,contador};
    array.push(contador);
    setArray(array);

  }

  return (
    <>
      
      <h1>Contador</h1>
      <p>{contador}</p>
      <button onClick={clickBoton}>Aumentar</button>
      {array.map( (item) => (<ItemComponent key={item}/>) )}

      

    </>
  )
}

export default App
