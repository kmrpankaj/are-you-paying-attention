import "./index.scss"
import {TextControl, Flex, FlexBlock, FlexItem, Button, Icon} from "@wordpress/components";

wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are You Paying Attention?",
  icon: "smiley",
  category: "common",
  attributes: {
    question: { type: "String" },
    answers: {type: "array", default: ["red", "blue"]}
  },
  edit: EditComponents,
  save: function (props) {
    return null;
  },
});

function EditComponents(props) {

  function updateQuestion(value) {
    props.setAttributes({question: value})
  }

  function deleteAnswer(indexToDelete) {
    const newAnswers = props.attributes.answers.filter(function(x, index) {
        return index != indexToDelete;
    })
    props.setAttributes({answers: newAnswers})
  }

  return (
    <div className="paying-attention-edit-block">
        <TextControl label="Question:" value={props.attributes.question} onChange={updateQuestion} style={{fontSize: "20px"}} />
        <p style={{fornSize: "13px", margin: "20px 0 8px 0"}}>Answers:</p>
        {props.attributes.answers.map(function (answer, index) {
            return (
            <Flex>
                <FlexBlock>
                    <TextControl value={answer} onChange={newValue => {
                        const newAnswers = props.attributes.answers.concat([])
                        newAnswers[index] = newValue
                        props.setAttributes({answers: newAnswers})
                    }} />
                </FlexBlock>
                <FlexItem>
                    <Button>
                        <Icon icon="star-empty" className="mark-as-correct" />
                    </Button>
                </FlexItem>
                <FlexItem>
                    <Button variant="link" className="attention-delete" onClick={() => deleteAnswer(index)}>Delete</Button>
                </FlexItem>
            </Flex>
            )
        })}
        <Button variant="primary" onClick={() => {
            props.setAttributes({answers: props.attributes.answers.concat([""])})
        }}>Add another asnwer</Button>
    </div>
  );
}
