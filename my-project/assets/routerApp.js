import React from "react";
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

      

            <Route path="/candidat">
            </Route >

            <Route path="/register">
                <Register></Register>
            </Route>
      </BrowserRouter>)
    }
