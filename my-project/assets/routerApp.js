import React from "react";
import {BrowserRouter, NavLink, Route} from "react-router-dom";
import Home from "./components/Home"
import Register from "./components/Register"
<<<<<<< HEAD
<<<<<<< HEAD
=======
import CreateCandidate from "./components/CreateCandidate";
>>>>>>> master
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
<<<<<<< HEAD
=======
=======
>>>>>>> master
      <NavLink to='/createCandidate'>
        Create candidate
      </NavLink>

<<<<<<< HEAD
>>>>>>> master
=======
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
<<<<<<< HEAD
      

            <Route path="/candidat">
            </Route >

            <Route path="/register">
                <Register></Register>
            </Route>
      </BrowserRouter>)
    }
=======
=======
>>>>>>> master
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
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> master
