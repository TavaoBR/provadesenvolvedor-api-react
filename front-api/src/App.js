import logo from './logo.svg';
import './App.css';
import { useEffect, useState } from 'react';

function App() {

  const [data, setData] = useState([]);
 
   const getPonto = async () => {
    fetch("http://localhost:9850/api")
    .then((response) => response.json())
    .then((responseJson) => (
      console.log(responseJson),
      setData(responseJson)
    ))
   }

   useEffect(() =>{
      getPonto();
   }, [])


   const nomeEmploy = data.map(nome => nome.employeeName);
   const unicoNome = [new Set(nomeEmploy)]

   const replaceDados =  ["20/01/2023", "18/01/2023", "19/01/2023"]

   let Horas = data.map(horas => horas.amountOfHoursWorked)
   
   const total = Horas.reduce((partialSum, a) => partialSum + a, 0);

  

   const tBody1 = data.map(
    (dadosApi) => {
       
      const punchDateTime = dadosApi.entries.map(dadosEntries => {

        if(dadosApi.amountOfHoursWorked == 12){

            if(dadosEntries.punchType == 1){
              return(<td>{dadosEntries.punchDateTime.replace(replaceDados[1], "")}</td>)
            }
            
            if(dadosEntries.punchType == 2){
              return(<td colspan="3">{dadosEntries.punchDateTime.replace(replaceDados[2], "")}</td>)
            } 

        }

      })

      if(dadosApi.amountOfHoursWorked == 12){
        return(
          <tr>
            <td  data-label="Dia">{dadosApi.punchDate.replace("/2023", "")}</td>
              {punchDateTime}
              <td>{dadosApi.amountOfHoursWorked}</td>
          </tr>
       
        )  
      }


      
    }


   

   )

   const tbody2 = data.map(
    (dadosApi) => {
      const punchDateTime = dadosApi.entries.map(dadosEntries => {

        if(dadosApi.amountOfHoursWorked == 8){
           return(
          
          <td>{dadosEntries.punchDateTime.replace(replaceDados[0], "")}</td>
         
           )
        }

      })

      

      if(dadosApi.amountOfHoursWorked == 8){
        return(
          <tr>
            <td  data-label="Dia">{dadosApi.punchDate.replace("/2023", "")}</td>
              {punchDateTime}
              <td>{dadosApi.amountOfHoursWorked}</td>
          </tr>
       
        )  
      }
    }
   )






  return (
    <div className="App">
       <table class="table">
        <thead>
        
        </thead>
         <thead>
          <th>{unicoNome}</th>
          <th colspan="5"></th>  
         </thead>
         <thead>
            <th data-label="Dia">Dia</th>
            <th data-label="Entrada 1">Entrada </th>
            <th data-label="Saida 1" colspan="3">Saida </th>
            <th data-label="Horas Trabalhadas">Qtd. HS</th>
         </thead>
         <tbody>
           {tBody1}   
         </tbody>
           
         <thead>
            <th data-label="Dia">Dia</th>
            <th data-label="Entrada 1">Entrada 1</th>
            <th data-label="Saida 1">Saida 1</th>
            <th data-label="Entrada 2">Entrada 2</th>
            <th data-label="Saida 2">Sainda 2</th>
            <th data-label="Horas Trabalhadas">Qtd. HS</th>
         </thead>

         <tbody>
          {tbody2}
         </tbody>
          
          <thead>
            <th colspan="4"></th> 
            <th colspan="4">Total</th>     
          </thead>

          <tbody>
          <th colspan="4"></th> 
            <th colspan="4" rowspan="5">{total}</th>   
          </tbody>

         

       </table>
    
        
    </div>
  );
}

export default App;
