import React from 'react';



const url = "https://jsonplaceholder.typicode.com/posts"

class Blog extends React.Component {
    constructor() {
        super();

        this.state = {
            events: [],
            search:'',
           
        };
    }

    updateSearch = (e) => {
        const keyWord = e.target.value
        this.setState({
          search: keyWord,
        })
      }


     

    componentDidUpdate(prevProps, prevState){
      if(prevState.search !== this.state.search) {
        this.fetchText()
      }

    }
    componentDidMount() {

        fetch(url)
        .then(response => response.json())
        .then(response => {
            this.setState({
                events: response,
            })
        });
    }

    render() {

        

        return (

           <div className="r">
             
           <section className="display">
                  <input type='text'onChange={this.updateSearch} value={this.state.search}/>


                {this.state.events.filter((data) => {
                    if(this.state.search == null){
                        return data
                    }
                    else if(data.title.toLowerCase().includes(this.state.search.toLowerCase())){ 
                        return data
        } }).map(event => (

                    <div className="blog_article">
                        <h4>  {event.title}</h4>
                        <p>{event.body} </p>
                    </div>

                ))}

                </section>
                
            </div>
        );
    }

    
    fetchText = () => {
      this.setState({
         events: this.state.search,
      })
    }
}

export default Blog;