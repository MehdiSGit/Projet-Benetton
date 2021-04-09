import React from "react";
import {BrowserRouter, NavLink, Route} from "react-router-dom";
import Home from "./components/Home"
import Register from "./components/Register"
<<<<<<< HEAD
=======
import CreateCandidate from "./components/CreateCandidate";
>>>>>>> master

export default function App() {
  return (
    <BrowserRouter>

      <NavLink to='/home'>
        Accueil
      </NavLink>

      <NavLink to='/register'>
        Register
      </NavLink>

<<<<<<< HEAD
=======
      <NavLink to='/createCandidate'>
        {' ' } Create candidate
      </NavLink>

>>>>>>> master
      <Route path="/home">
        <Home/>
      </Route>

      <Route path="/register">
        <Register/>
      </Route>


      <Route path="/candidat">
      </Route>

<<<<<<< HEAD
      

            <Route path="/candidat">
            </Route >

            <Route path="/register">
                <Register></Register>
            </Route>
      </BrowserRouter>)
    }
=======
      <Route path="/recruteur">

      </Route>

      <Route>
      </Route>
      <Route path='/createCandidate'>
        <CreateCandidate/>
      </Route>

    </BrowserRouter>
  )
}
>>>>>>> master
