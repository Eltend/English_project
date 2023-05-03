# tmp_transfer



import SwiftUI
import UIKit
import Foundation
import UserNotifications
import SystemConfiguration
import CoreAudioKit
import CoreAudio
import JavaScriptCore
import NetworkExtension


struct ContentView: View {
    
    @State var isOn = true
    @State var isoff = false
    @State var lev2 = false
    @State var lev3 = false
    @State var lev4 = false
    @State var awn1 = false
    @State var awn2 = false
    @State var awn3 = false
    @State var awn4 = false
    @State var awn5 = false
    @State var awn6 = false
    @State var submit = false
    
    var t1 = "_____"
    var t2 = "_____"
    var t3 = "_____"
    var t4 = "_____"
    var t5 = "_____"
    var t6 = "_____"

    var body: some View {
        VStack {
            Image(systemName: "globe")
                .imageScale(.large)
                .foregroundColor(.accentColor)
            if isOn {
                Text("In which continent is England located?")
                Button("europa") {
                    lev2.toggle()
                    isOn.toggle()  
                }
                Button("afrika") {
                    isoff.toggle()
                }
                Button("asia") {
                    isoff.toggle()
                }
            }
            
            // rest of the code
            
            
            
            
            
            
            if lev2 == true {
                if lev3 == false {
                    Text("How many people live in England?")
                    Button("over 58 million") {
                        
                        isoff.toggle()
                    }
                    Button("under 55million") {
                        isoff.toggle()
                        
                    }
                    Button("over 55 million") {
                        
                        lev3.toggle()
                    }
                }
                
                
            }
            if lev3 == true {
                Text("What is the capital of England?")
                
                Button("Paris") {
                    isoff.toggle()
                }
                Button("London") {
                    
                    lev4.toggle()
                    lev3.toggle()
                    lev2.toggle()
                }
                Button("Wales") {
                    isoff.toggle()
                    
                }
            }
            if lev4 == true {
                if submit == false {
                    VStack {
                        Text("Tick the correct answers:")
                        Text("What can you see in London?")
                    }
                    
                    
                
            

                    
                    Button("Test \(t1)") { 
                        
                        
                        
                        
                        
                        awn1.toggle()
                        
                    }
                    
                    Button("Test2 \(t2)") {
                        awn2.toggle()
                        
                    }
                    Button("Test3 \(t3)") {
                        awn3.toggle()
                        
                    }
                    Button("Test4 \(t4)") {
                        awn4.toggle()
                    }
                    Button("Test5 \(t5)") {
                        awn5.toggle()
                    }
                    Button("Test6 \(t6)") {
                        awn6.toggle()
                    }

                    
                    Button("submit") {
                        
                        submit.toggle()
                        
                    }
                }
                if awn1 == true {
                    
                    t1 = "#####"
                    
                    
                }
                if awn2 == true {
                    
                    t2 = "#####"
                    
                    
                }
                if awn3 == true {
                    
                    t3 = "#####"
                    
                    
                }
                if awn4 == true {
                    
                    t4 = "#####"
                    
                    
                }
                if awn5 == true {
                    
                    t5 = "#####"
                    
                    
                }
                if awn6 == true {
                    
                    t6 = "#####"
                    
                    
                }
                if awn1 == false {
                    
                    t1 = "_____"
                    
                    
                }
                if awn2 == false {
                    
                    t2 = "_____"
                    
                    
                }
                if awn3 == false {
                    
                    t3 = "_____"
                    
                    
                }
                if awn4 == false {
                    
                    t4 = "_____"
                    
                    
                }
                if awn5 == false {
                    
                    t5 = "_____"
                    
                    
                }
                if awn6 == false {
                    
                    t6 = "_____"
                    
                    
                }
                if submit == true {
                    
                    
                    if awn6 == true {
                        if awn3 == true {
                            if awn1 == true {
                                if awn2 == true {
                                    if awn5 == false {
                                        if awn4 == false {
                                            
                                            
                                            
                                        }
                                        
                                        
                                    }
                                    
                                    
                                }
                                
                                
                            }
                            
                            
                        }
                        
                        
                    }
                    
                }   
                
            }
            
            if isoff == true {
                
                exit(0)
                
            }
        }
    }
}
