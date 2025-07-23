import { createRoot } from "react-dom/client";
const root= createRoot(document.getElementById("root"))

function App(){
  const hours= new Date().getHours()
  let timeofday

  if(hours < 12){
    timeofday="morning"
  }else if(hours >= 12 && hours < 17){
    timeofday="afternoon"
  }else if(hours >= 17 && hours < 21){
    timeofday="evening"
  }else{
    timeofday="night"
  }

  return(
    <h1> good {timeofday} </h1>
)
}

root.render(
  <App />
  )