# 3D-metaphor-code-visualization
A novel model for code smells visualization that addresses existing limitations.

Visualization of code smells is an important apporach for developers that can help improve code quality, communication, and understanding. 
By using visual representations of code issues, developers can quickly identify potential problems and work to address them before they become more serious issues.

Proposed a code smell visualization approach using two metaphors together to gain more complete understanding of the code-base. 
The metaphors of "island" and "city" are used that it helps to illustrate different aspects of the code and the relationships of the code in different abstract levels. 

The tool will be able to generate 3D visualizations for buildings, islands, inside building views according to input dataset. 

#sample date set

{
  "classes" : [
    {
      "class_name": "Product Class",
      "class_id" : 1,
      "no_of_lines" : 123,
      "position": [
        {
        "x": 3,
        "y": 1,
        "z": 4
        }
      ],
    "is_code_smell" : "yes",
    "smell_type" : "Empty Class",
    "color_code" : "1, 0, 0",
    "code_snippet" : "final class DEFAULT { }",
    "methods" : [
          {
          "method_id" : 1,
          "name" : "getTransferData",
          "no_of_lines" : "12",
          "no_of_attributes" : "int status = 0;",
          "is_code_smell" : "no",
          "smell_type" : "",
          "code_snippet": "",
          "color_code" : "1, 1, 1",
          "priority" : "",
          "class_id" : "1",
          "effort" : "9",
          "suggested_code" : "",
          "suggested_links" : "",
          "position": [
            {
            "x": -5,
            "y": 1,
            "z": 34
            }
          ],
          "parameters": [
            {
            "pname" : "String[] args"
            },
            {
            "pname" : "Properties additionalUserProperties"
            },
            {
            "pname" : "ClassLoader coreLoader"
            }
          ]
        }
    ]
  }
 ]
}

Zooming, localization and browsing are essential features that are under consideration.

This tool will be able to zoom in or out the buildings. The tips, navigations, summery graphs feature helps developers to navigate through buildings in 3D environment. 

![3D Model for Island Metaphor](https://user-images.githubusercontent.com/8435152/236656083-df177f8d-ab63-4739-99ce-4c5b7251d193.png)



