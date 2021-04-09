import React from 'react';



const url = "https://jsonplaceholder.typicode.com/posts"

 class Blog extends React.Component {
    constructor() {
        super();

        this.state = {
            events: [],
            // currentPage: 1,

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

        fetch(url).then(response => response.json()).then(response => {
            console.log(response.records);
            this.setState({
                events: response,
            })
        });

        return (
        
            <div>
                {this.state.events.map(event => (
                    <div>
                        <img style={{width: "20%" }}src="https://image.freepik.com/vecteurs-libre/journee-internationale-personnes-handicapees-au-design-plat_23-2148723226.jpg" alt=""/>
                        <h4>  {event.title}</h4>
                        <p>{event.body} </p>
                    </div>
                ))}

                {/* <button onClick={this.fetchEvents}>Fetch</button> */}
                {/* <button>More articles</button> */}
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

