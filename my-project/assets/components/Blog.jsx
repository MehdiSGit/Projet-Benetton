import React from 'react';
import { createPortal } from 'react-dom';


const url = "https://jsonplaceholder.typicode.com/posts"

 export class Blog extends React.Component {
    constructor() {
        super();

        this.state = {
            events: [],
        };
        this.fetchEvents = this.fetchEvents.bind(this);
    }


    render() {
        return (
           

            <div>
             <>
            <button onClick={this.fetchEvents}>Fetch</button>
            </>
                {this.state.events.map(event => (
                <div> 
                     <p> Hello</p>
                     <h4>Title: {event.title}</h4>
                     <p>Body: {event.body}</p>
                     <button>Decouvrez les articles</button>
                </div> 
                ))}
               
            </div>
  
     
        );
    }

    // updatePage(number) {
    //     this.setState({
    //         currentPage: number
    //     });
    // }

    fetchEvents() {

      
        fetch(url).then(response => response.json()).then(response => {
            this.setState({
                events: response
            })
        });
    }


}

export default Blog;
