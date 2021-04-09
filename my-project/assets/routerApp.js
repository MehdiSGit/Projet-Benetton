import React from "react";
<<<<<<< HEAD
import {BrowserRouter, NavLink, Route} from "react-router-dom";
import Home from "./components/Home"
import Register from "./components/Register"

export default function App() {
  return (
    <BrowserRouter>

      <NavLink to='/home'>
        Accueil
      </NavLink>

      <NavLink to='/register'>
        Register
      </NavLink>

      <Route path="/home">
        <Home/>
      </Route>

      <Route path="/register">
        <Register/>
      </Route>


      <Route path="/candidat">
      </Route>

      <Route path="/recruteur">
=======
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    Navlink,
    BrowserRouter
  } from "react-router-dom";
  import Home from "./components/Home"

  export default function App() {
    return (

      <BrowserRouter>

        <Navlink>
        </Navlink>

        <Route path="/home">
          <Home></Home>
        </Route>

        <Route path="/candidat">
        </Route >
>>>>>>> master

      </Route>
      <Route>
      </Route>

<<<<<<< HEAD
    </BrowserRouter>
  )
}
=======
        </Route>
        <Route>
        </Route>
      </BrowserRouter>)
    }
>>>>>>> master
