import React from 'react';
import { createPortal } from 'react-dom';


const url = "https://data.iledefrance.fr/api/records/1.0/search/?dataset=photoscc&q=&rows=5&facet=theme"

 export class Blog extends React.Component {
    constructor() {
        super();

        this.state = {
            events: [],
            currentPage: 1,

        };
        // this.fetchEvents = this.fetchEvents.bind(this);
    }

//  /**
//    * Cette componentDidUpdate qui se déclenche à chaque fois qu'on fait un setState quelque part
//    * ça sert à gérer les effets de bord.
//    * @param prevProps
//    * @param prevState
//    */
//   componentDidUpdate(prevProps, prevState) {

//     // On ne veut relancer la requête que si l'ancienne page est différente de la nouvelle.
//     if (prevState.currentPage !== this.state.currentPage) {
//       this.fetchEvents();
//     }
//   }

    render() {

        const resultat =  fetch(url).then(response => response.json()).then(response => {
            this.setState({
                events: response.records ,
            })
        });


        return (
       <div>
                {this.state.events.map(event => (
                <div> 
                     <h4> Titre: {event.fields.titre}</h4>
                     <h6>theme:{event.fields.theme} </h6>
                </div> 
                ))}
               
            {/* <button onClick={this.fetchEvents}>Fetch</button> */}
            <button>More articles</button>
         </div>
  
    
        );
    }

    // updatePage(number) {
    //     this.setState({
    //         currentPage: number
    //     });
    // }


}

export default Blog;
