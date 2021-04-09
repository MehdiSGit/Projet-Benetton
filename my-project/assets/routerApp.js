import React from "react";
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

        <Route path="/recruteur">

        </Route>
        <Route>
        </Route>
      </BrowserRouter>)
    }